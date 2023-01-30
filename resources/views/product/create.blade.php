
      <div class="form-control">
        <form action="{{ Route('product.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="category_id">Category</label>
                <select class="form-control" id="category_id" name="category_id" required>
                  <option value="">Select Category</option>
                  @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                  @endforeach
                </select>
              </div>

              
        <div class="form-group">
            <label for="product_name">Name</label>
            <input type="text" name="product_name">
        </div>
        
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number"name="price">
        </div>
           
        
        <div class="form-group">
            <label for="quantity">Quantity</label>
            <input type="number"name="quantity">
        </div>
          
        
        
        <div class="form-group">
            <label for="image_path">Image</label>
    <input type="file" id="image_path" name="image_path">
   
            
        </div>
        
        <div class="form-group">
            <label for="type">Type</label>
            <input type="text" name="type">
            
        </div>
           
        
        <button type="submit">Submit</button>
        </form>
      </div>