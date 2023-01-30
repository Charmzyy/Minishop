<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cart = session()->get('cart', []);
    
        $order = Order::create([
            'user_id' => auth()->id(),
            'total_amount' => 0
        ]);
    
        foreach ($cart as $product_id) {
            $product = Product::find($product_id);
            $order->orderItems()->create([
                'product_id' => $product->id,
                'unit_price' => $product->price,
                'quantity' => 1
            ]);
            $order->total_amount += $product->price;
        }
    
        $order->save();
        session()->forget('cart');
    
        return redirect('/orders');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::findOrfail($id);
        //show an individual order alone retireve or show eeor message
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('order.edit',[
            'order' =>Order::where('id',$id)->first() ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = [
            'product_id'=>$request->input(),
            'quantity'=>$request->input(),
        ];

        Order::where('id',$id)->update($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Order::destroy($id);
    }
}
