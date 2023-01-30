<form action="{{route('category.store')}}" method="post">
    @csrf
    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="form-group">
      <label for="parent_id">Parent Category</label>
      <select class="form-control" id="parent_id" name="parent_id">
        <option value="">Select Parent Category</option>
        @foreach($categories as $category)
          <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
      </select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
  
