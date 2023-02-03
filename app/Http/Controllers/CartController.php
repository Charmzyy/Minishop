<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Products,Order};
class CartController extends Controller
{
	public function addToCart(Request $request){

//IMPORTANT THE AJAX SHOULD HAVE THE SESSION ID AND SHOULD BE ENCRYPTED

		$item_id = $request->input('item');
       		$quantity = $request->input('quantity',1);

	 //check to see if theres a cart present in the current session
	  
	 function Add_cart($id,$Quantity){

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
	
	}




	public function viewCart(Request $request){

		if ($request->session()->has('cart')){
		
		
			$products = [];
			$cart = session('cart');
			$Total_price = 0;

			foreach($cart as $item){
				$product = Products::findorfail($item['id']);
				$Total_price += $product->Price;
				array_push($products,$product);
			 }

			return view('Cart.cart',['products' => $products,'total'=>$Total_price]);
		}else{
			$cart=[];
			session()->put('cart',$cart);
			$cart = session('cart');
  
		//HAVE TO TELL USER TO ADD ITEMS TO CART	
			return view('Cart.cart',['cart'=>$cart]);
		    }

		
	
	}


	public function makeOrder(Request $request){
              if(session()->has('cart')){

		      $TOTAL_PRICE=0;
		      $cart = session('cart');
		      
		      foreach($cart as $item){
			      $TOTAL_PRICE  += $item['price'];
		      }
			  
		      $order = Order::create([
			      
			      'CustomerId'=> request()->user->id,
			      'Price'=>$TOTAL_PRICE  
		      ]);
		    
		      foreach($cart as $item){

			      $order->Cart()->create([
				      'ProductId'=>$item['id'],     
				      'Quantity'=> $item['Quantity']		
			      ]);
               
		      }
	      }


		return view('Cart.checkout',['total_price'=>$TOTAL_PRICE]);
	
	}

	public function removeItem(Request $request,$id){

		//REMOVE THE SPECIFIC ITEM
		//
		$cart = session->get('cart');

		foreach($cart as $item){

			if ($item['id'] === $id){

				$cart;
			
			}
		
		
		}
	
	
	}



}
