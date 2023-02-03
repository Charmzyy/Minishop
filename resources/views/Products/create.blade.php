<!DOCTYPE html>
<html>
    <head>
        <title>Create product</title>
    </head>
    <body>


    <form action="{{ route('Products.store')}}" method="POST">
        @csrf
        <label for="Product name">Name
            <input type="text" name="ProductName" required>
        </label>
        <label for="CategoryId">CategoryId
            <input type="number" name="CategoryId" required>
        </label>
        <label for="Quantity">quantity
            <input type="number" name="Quantity">
        </label>
        <label for="Price" >Price
            <input type="number" name="Price">
        </label>
        <label for="Type">Type
            <input type="text" name="Type" required>
        </label>
        

        <p><button type="submit">Add</button></p>
        <p><button type="reset">Clear</button>

        </form>
    </body>
</html>