<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Products,Order};
class CartController extends Controller
{
	public function addToCart(Request $request){

//IMPORTANT THE AJAX SHOULD HAVE THE SESSION ID AND SHOULD BE ENCRYPTED

	 $item_id = $request->input('item',1);
	 $quantity = $request->input('quantity',1);

	 //check to see if theres a cart present in the current session
	  
	 function Add_cart($id,$Quantity){
dd(session('cart'));
		 $product = Products::findorfail($id);
		 $price = $Quantity * $product->price;

		 $cart = session('cart');
		  array_push($cart,[
		  	'id'=> $product->id,
			'name'=>$product->name,
			'Quantity'=> $Quantity,
			'price'=>$price,
		      ]
		  );


		  session()->put('cart',$cart);

	 } 
	 if ($request->session()->has('cart')){
               Add_cart($item_id,$quantity);
		 
	 }
	 else{
	 	$cart = [];
		session()->put('cart',$cart);
		Add_cart($item_id,$quantity);

	 
	 }
	 return back()->with('cart','Product added to cart');
	
	}




	public function viewCart(Request $request){

		if ($request->session()->has('cart')){
		
			$products = [];
			$cart = session('cart');

			foreach($cart as $item){
				$product = Products::findorfail($item['id']);
				array_push($products,$product);
			 }

			return view('cart', ['products' => $products]);
		}
		else{
			$cart=[];
			session()->put('cart',$cart);

			return view('cart');

		
		}
	
	}


	public function makeOrder(Request $request){

		$TOTAL_PRICE=0;
		$cart = session('cart');
		foreach($cart as $item){
			$TOTAL_PRICE  += $item['price'];
		}
		$order = Order::create([
		   'CustomerId'=> request()->user->id,
		   'price'=>$TOTAL_PRICE
		]);
		foreach($cart as $item){

			$order->Cart()->create([
				'ProductId'=>$item['id'],
				'Quantity'=> $item['Quantity']
				
			]);
               
		}

		return ;
	
	}

	// public function removeItem(Request $request,$id){

	// 	//REMOVE THE SPECIFIC ITEM
	// 	//
	// 	$cart = session->get('cart');

	// 	foreach($cart as $item){

	// 		if ($item['id'] === $id){

	// 			$cart;
			
	// 		}
		
		
	// 	}
	
	
	// }



}
