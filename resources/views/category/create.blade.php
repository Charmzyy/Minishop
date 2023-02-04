<html>
  <head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>

  @if(session()->has('message'))
    <div class="alert alert-warning" role="alert">
      {{ session()->get('message') }}
    </div>
  @endif
<form action="{{route('category.store')}}" method="post" class="form-control">
    @csrf
    
   
      <label for="name">Name</label>
      <input type="text" class="form-control" id="name" name="name" required>
    </div>
    
      <label for="parent_id">Parent Category</label>
      <select class="form-control" id="parent_id" name="parent_id">
        <option value="">Select Parent Category</option>
        @foreach($categories as $category)
        @if ($category->id == 1 || $category->id == 2 || $category->id == 3)
        <option value="{{$category->id}}">{{$category->name}}</option>
      @endif
      
        @endforeach
      </select>
    
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
  

</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>