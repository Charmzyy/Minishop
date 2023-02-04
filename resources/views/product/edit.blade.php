@if(session()->has('update'))
<div class="alert alert-warning" role="alert">
    {{ session()->get('update') }}
  </div>


@endif
      


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"></head>




<div class="row">
 
    <div class="col-md-12 grid-margin">
      <div class="card">
        <div class="card-header">
               <h4> Edit {{ $product->name }}
                 </div>
                 <div class="card-body">
                    <form action="{{ route('product.edit',$product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="control-group col-12">
                              <label for="category_id">Category</label>
                              <select class="form-control" id="category_id" name="category_id" required>
                                <option value="{{ $product->category->name }}">Select Category</option>
                                @foreach($categories as $category)
                                  <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                              </select>
                            </div>
                            <div class="control-group col-12 mt-2">
                              <label for="name">Name</label>
                              <input type="text" name="name" value="{{ $product->name }}">
                            </div>
                            <div class="control-group col-12 mt-2">
                                <label for="body">Description</label>
                         <textarea type="text" class="ckeditor form-control" name="description" > {{ $product->description }}</textarea>
                                        
                            </div>
                            <div class="control-group col-12 mt-2">
                              <label for="manufacturer">Manufacturer</label>
                              <input type="text"name="manufacturer"value="{{ $product->manufacturer }}">
                            </div>
                            <div class="control-group col-12 mt-2">
                              <label for="price">Price</label>
                              <input type="number"name="price"value="{{ $product->price }}">
                            </div>
                            <div class="control-group col-12 mt-2">
                              <label for="quantity">Quantity</label>
                              <input type="number"name="quantity"value="{{ $product->quantity }}">
                            </div>
                            <div class="control-group col-12 mt-2">
                              <label for="type">Type</label>
                              <input type="text"name="type" value="{{ $product->type }}">
                            </div>
                            <div class="control-group col-12 mt-2">
                                <label for="image_path">Image</label>
                                <input type="file"   name="image_path" class="form-control" placeholder="Enter Image" ></input>
                                <img src="{{ asset('images/blogs/'.$product->image_path) }}" alt="" />
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="control-group col-12 text-center">
                                <button id="btn-submit"  type="submit"class="btn btn-primary">
                                    Add Product
                                </button>
                            </div>
                        </div>
                    
                    </form>

                    </html>

                   
                    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
                    
                    <script>
                        ClassicEditor
                            .create( document.querySelector( '#editor' ) )
                            .catch( error => {
                                console.error( error );
                            } );
                    </script>
                   
                   {{--  --}}
                   
