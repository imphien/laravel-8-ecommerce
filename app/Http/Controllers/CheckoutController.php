<?php

namespace App\Http\Controllers;

use App\Mail\OrderShipped;
use App\Models\Order;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    public function showForm(){
        /** @var \App\Models\User $user **/
        $user = Auth::user();

        $userCart = $user->carts()->firstOrCreate(['status' => 'N']);

        if($userCart->products->isEmpty())
            return redirect('/');

        $subTotal = $userCart->products->sum(function($product){
            return $product->price * $product->pivot->quantity;
        });

        return view('checkout', [
            'user' => $user,
            'subTotal' => $subTotal
        ]);
      
    }

    public function createOrder(Request $request){
       
        $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'address_line' => 'required|max:255',
            'city' => 'required|max:255',
            'mobile' => 'required|numeric|digits:10',
            'cod' => 'required|boolean'
        ],[
            'first_name.required' => 'Vui lòng nhập Họ.',
            'last_name.required' => 'Vui lòng nhập Tên.',
            'email.required' => 'Vui lòng nhập Email.',
            'email.email' => 'Email không đúng định dạng.',
            'address_line.required' => 'Vui lòng nhập địa chỉ.',
            'city.required' => 'Vui lòng nhập thành phố.',
            'mobile.required' => 'Vui lòng nhập số điện thoại.',
            'mobile.numeric' => 'Số điện thoại phải là số.',
            'mobile.digits' => 'Số điện thoại phải gồm đúng 10 chữ số.',
            'cod.required' => 'Vui lòng chọn phương thức thanh toán.',
            'cod.boolean' => 'Dữ liệu thanh toán không hợp lệ.'
        ]);

        /** @var App\Models\User $user **/
        $user = Auth::user();
        $userCart = $user->carts()->firstWhere('status', 'N');

        if(!$userCart || $userCart->products->isEmpty())
            return redirect('/');
        
        $subTotal = $userCart->products->sum(function($product){
            return $product->price * $product->pivot->quantity;
        });

        $order = $user->orders()->create(array_merge($request->except(['cod', '_token']), ['status' => 'N', 'grand_total' => $subTotal]));

        foreach ($userCart->products as $product) {
            $order->products()->attach($product->id, [
                'price' => $product->price,
                'quantity' => $product->pivot->quantity,
                'discount' => 0
            ]);
        }

        $transaction = new Transaction();
       
        $transaction->mode = 'COD';
        $transaction->status = 'N';

        $order->transactions()->save($transaction);

    
        $userCart->status = 'C';
        $userCart->save();

        return view('thanks');

    }
}
