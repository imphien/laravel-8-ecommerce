<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
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
        return view('admin.transaction', [
            'transactions' => Transaction::all(),
            'status' => $this->status_array,
            'mode' => $this->transaction_mode
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        $transaction->status = $request->status;
        $transaction->save();

        return back();
    }

}
