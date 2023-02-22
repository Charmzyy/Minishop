<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Reviews;
use PhpParser\Node\Stmt\TryCatch;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $PassedTime = Carbon::now()->subweeks(2);
            $currentDate = Carbon::now();

$startOfMonth = $currentDate->copy()->startOfMonth();
$endOfMonth = $currentDate->copy()->endOfMonth();


$deal_Product = Products::whereBetween('created_at', [$startOfMonth, $endOfMonth])->where('price','<=',7)
    ->get();
    $firstProduct = $deal_Product->first();
$lastProduct = $deal_Product->last();

$dealDuration = $lastProduct->created_at->diffInDays($firstProduct->created_at);



	    $products = Products::paginate(20);
	    $new_arrival = Products::where('created_at','>=',$PassedTime)->get();


	    return view('product.index',['products'=>$products,'new_arrival'=>$new_arrival,'deal_Product'=>$deal_Product,'dealDuration'=>$dealDuration]);
    }

    public function typefilter($type)
    {
        try {
            //code...
            $products = Products::where('type', $type)
                         ->get();

        return view('product.all', compact('products'));

        } catch (\Throwable $th) {
            return view('product.all', ['products' => $products])->with('stock','Sorry we are out of stock check in 5 days');
            
        }
       
        
    }


   
    public function filter($category_id, $type)
    {
        try {
            //code...
            $products = Products::where('category_id', $category_id)
                         ->where('type', $type)
                         ->get();

        return view('product.all', compact('products'));

        } catch (\Throwable $th) {
            return view('product.all', ['products' => $products,])->with('stock','Sorry we are out of stock check in 5 days');
            
        }
       
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('product.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
	   

       $file=$request->file('image_path');
       $filename=time() .".{$file->guessClientExtension()}"; //
       $file->move('images',$filename);

    $product = Products::create([
        'category_id' => $request->input('category_id'),
        'name'=> $request->input('name'),
        'description'=> $request->input('description'),
        'manufacturer'=> $request->input('manufacturer'),
        'price'=>$request->input('price'),
        'quantity'=>$request->input('quantity'),
        'type'=>$request->input('type'),
        'image_path'=>$filename,
        
    ]);
return back()->with('added','Product added successfully');
	    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
	    $product = Products::with('reviews','reviews.children.children')->findorfail($id);
        
	    return view('product.show',['product'=>$product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
	    //return the product
	    $product = Products::findorfail($id);

	    return view('edit',['product',$product]);
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

	   $data= [
        'category_id' => $request->input('category_id'),
        'name'=> $request->input('name'),
        'description'=> $request->input('description'),
        'manufacturer'=> $request->input('manufacturer'),
        'price'=>$request->input('price'),
        'quantity'=>$request->input('quantity'),
        'type'=>$request->input('type')
       ];

       if($request->hasFile('image_path')){
            $file = $request->file('image_path');
            $filename = time() . ".{$file->guessClientExtension()}";
            $file->move('images/blogs', $filename);
            $data['image_path'] = $filename;
      
        Products::where('id', $id)->update($data);
        return back()->with('update', 'Product has been updated');

       }




    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function pricefilter(Request $request){
        $min_price = (int)$request->input('price_from');
        $max_price =(int)$request->input('price_to');

        $searched = Products::whereBetween('price', [$min_price, $max_price])->get();
        return view('product.searched',compact('searched'));
    }

    // public function saveRating(Request $request){
    //     $rating = $request->input('rating');
    //     $product_id = $request->input('product_id');
    
    //     // save the rating and product ID in the database or perform other actions
    // }
    
    public function allproducts(){
        // dd($request);
       
        
        $products =Products::get();
    
         return view('product.all',compact('products'));}
        
         
    
    public function destroy($id)
    {
        
    }

//     public function updateQuantity(Request $request)
// {
//     $product = Products::find($request->id);
//     if ($product) {
//         $product->quantity = $request->quantity;
//         $product->save();
//         return response()->json(['success' => true]);
//     }
//     return response()->json(['error' => 'Product not found'], 404);
// }

public function about(){
    return view('about');
}
public function contact(){
    return view('contact');
}
public function blog(){
    return view('blog');
}
public function cart(){
    // dd(session('cart'));
    return view('cart');
}
public function addtocart($id){

    $product = Products::findOrfail($id);

        if(!$product){
//no produt with the id exist
            return 'no product like that';
        }
        
//  dd($product->name);
      $cart = session()->get('cart');

      if(!$cart){
        //if cart is empty
        $cart = [
            $id=>[
                'name' => $product->name,
                'quantity' => 1,
                'price' => $product->price,
                'image_path' =>$product->image_path
                
            ]
            ];
            session()->put('cart',$cart);

            return back()->with('success','product added to cart');
      }
      
       if(isset($cart[$id])){
         $cart[$id] ['quantity']++;

         session()->put('cart',$cart);
          return back()->with('success','product added successfully');
       }

       $cart[$id] =[

        'name' => $product->name,
        'quantity' => 1,
        'price' => $product->price,
        'image_path' => $product->image_path
        
        
       ];
       session()->put('cart',$cart);
       return back()->with('success','Product added to cart');
}
public function buy($id){

    $product = Products::findOrfail($id);

        if(!$product){
//no produt with the id exist
            return 'no product like that';
        }
        
//  dd($product->name);
      $cart = session()->get('cart');

      if(!$cart){
        //if cart is empty
        $cart = [
            $id=>[
                'name' => $product->name,
                'quantity' => 1,
                'price' => $product->price,
                'image_path' =>$product->image_path
                
            ]
            ];
            session()->put('cart',$cart);

            return view('cart');
      }
      
       

       
}
public function remove($id){
    $cart = session()->get('cart');
    unset($cart[$id]);
    session()->put('cart', $cart);
    return redirect()->back()->with('success','Item has been removed from your cart!');
}
public function checkout(){
    $cart = session()->get('cart');
    return view('checkout');
}
public function placeorder(Request $request) {
    if (!auth()->check()) {
        return redirect()->route('login');
    }
    if ($request->has('payment_method')) {
        // Get the selected payment method from the request
        $paymentMethod = $request->input('payment_method');

        if ($paymentMethod == 'paypal') {
            // Redirect the user to the Paypal payment page
        } else if ($paymentMethod == 'bank_transfer') {
            // Redirect the user to the bank transfer page
        }

        // If the selected payment method is not supported, return an error message
        return redirect()->back()->with('error', 'Payment method not supported');
    }

    $total = 0;
    $cart = session('cart');
    foreach ($cart as $id => $details) {
        $total += $details['price'] * $details['quantity'];
    }

    // Create new order
    $order = Order::create([
        'user_id' => auth()->user()->id,
        'total_price' => $total
    ]);

    // Add order details to the order_product table
    foreach ($cart as $id => $details) {
        $orderProduct = OrderProduct::create([
            'order_id' => $order->id,
            'product_id' => $id,
            'quantity' => $details['quantity']
        ]);
    }

    // Clear the cart session
    $request->session()->forget('cart');

    // Redirect to order confirmation page
    return back()->with('order_id','Your order was processed');
}

public function storereview(Request $request)
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }
        if(!empty($request->input('parent_id'))){
            //this is a reply
   
            $review = Reviews::create([
                'user_id'=>auth()->user()->id,
                'products_id'=>$request->input('products_id'),
                'review'=>$request->input('review'),
                'parent_id'=>$request->input('parent_id')
                
            ]);
         } 
         else {
     //this is a comment
  
     $review = Reviews::create([
        'user_id'=>auth()->user()->id,
        'products_id'=>$request->input('products_id'),
        'review'=>$request->input('review')
    ]);
         }
    
       
        return back();
    

    
       

       
    
    }
  

}
