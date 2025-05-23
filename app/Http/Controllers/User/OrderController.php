<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    private $status_array = [
        "N" => ['Chưa xử lý', 'blue'],
        "C" => ['Huỷ', 'red'],
        "P" => ['Đã trả', 'limegreen'],
	    "D" => ['Đang vận chuyển', 'limegreen']
    ];
    
    private $transaction_mode = [
        "COD" => "Thanh toán khi nhận hàng"
    ];


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('user.orders', [
            'orders' => auth()->user()->orders,
            'status' => $this->status_array
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view('user.view-order', [
            'order' => $order,
            'status' => $this->status_array,
            'mode' => $this->transaction_mode
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        abort_if($this->checkOrder($order) || !$order->status == 'N', 404);

        $order->status = 'C';
        $order->save();
        
        return back();

    }

    private function checkOrder(Order $order){
        /** @var App\Models\User $user */ 
        $user = Auth::user();
        return ! $user->is($order->user);
    }

}
