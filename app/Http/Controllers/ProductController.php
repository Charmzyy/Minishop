<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('product.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
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
        $filename=time() .". {$file->guessClientextension()}";
        $file->move('images',$filename);
         
        
            $product = Product::create([
                'category_id' => $request->input('category_id'),
                'name' => $request->input('name'),
                'price'=> $request->input('price'),
                'quantity'=>$request->input('quantity'),
                'image_path'=> $request->$filename,
                'type'=>$request->input('type')
            ]);
        

}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('product.edit',[
            'product'=>Product::where('id',$id)->first()
        ]);
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
            'category_id' => $request->input('category_id'),
            'name' => $request->input('name'),
            'price'=> $request->input('price'),
            'quantity'=>$request->input('quantity'),
            'type'=>$request->input('type')
        ]; 

        if ($request->hasFile('image_path')) {
            $file = $request->file('image_path');
            $filename = time() . ".{$file->guessClientExtension()}";
            $file->move('images', $filename);
            $data['image_path'] = $filename;
        }

        Product::where('id',$id)->update($data);

        return back()->with('product_edit','Product was updated succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);
    }
}
