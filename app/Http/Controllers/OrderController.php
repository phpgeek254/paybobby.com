<?php

namespace App\Http\Controllers;

use App\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * @property  destination
 */
class OrderController extends Controller
{

    private $destination = 'attachments';

    public function  __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
       $orders = null;
       if ( Auth::check() and Auth::user()->user_type == 'employer')
       {
           $orders = Order::where('client_id', Auth::id())->paginate(10);
       } else {
           $orders = Order::where('employee_id', Auth::id())->paginate(10);
       }

       return view('orders.order-list', compact('orders'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'cost'=>'required',
            'expiry_date'=>'required|date|after:'.Carbon::now()->day,
        ]);

        $order = new Order();
        $order->category_id = $request->category_id;
        $order->client_id = Auth::id();
        $order->expiry_date = $request->expiry_date;
        $order->status = 'new';
        $order->cost = $request->cost;
        $order->instructions = $request->instructions;
        $order->title = $request->title;


        if ($file = $request->file('file'))
        {
            $file_name = uniqid().$file->getClientOriginalName();
            $order->file = $this->destination.$file_name;
            $file->move($this->destination, $file_name);
        }

        $order->save();
        return redirect()->back()->withMessage('Order placed successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Order $order)
    {
        $this->validate($request, [
            'cost'=>'required',
            'expiry_date'=>'required|date|after:'.Carbon::now()->day,
        ]);

        $order->category_id = $request->category_id;
        $order->client_id = Auth::id();
        $order->expiry_date = $request->expiry_date;
        $order->status = 'new';
        $order->cost = $request->cost;
        $order->instructions = $request->instructions;
        $order->title = $request->title;


        if ($file = $request->file('file'))
        {
            $file_name = uniqid().$file->getClientOriginalName();
            $order->file = $this->destination.$file_name;
            $file->move($this->destination, $file_name);
        }

        $order->update();
        return redirect()->back()->withMessage('Order updated successfully');
    }


    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->back()->withMessage('Order deleted!');
    }
}
