<form action="{{route('category.store')}}" method="post">
    @csrf
    <label for="categoryName">Category Name
      <input type="text" name="CategoryName" required>
    </label>
    <label for="ParentCategory">ParentCategory
      <input type="text" name="ParentCategory" >
    </label>

    <p><button type="submit">Add</button>  
  </form>
  
