<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Order,User};
class OrderController extends Controller
{
	public function viewOrders(Request $request){

		$user = User::findorfail($request->user()->id);
 		
		$orders = $user->Order;
            return view('orders',['orders'=> $orders]);              
 
	
	}


	
}
