<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Edit product</h1>

    <form action="{{ route('update',$product->id) }}" method="post">
        @csrf
        @method('put')
        <label for="name"> Producte Name:</label>
        <input type="text" name='name' value="{{ $product->name }}"><br><br>

        <label for="quantity"> Quantity:</label>
        <input type="number" name='quantity' value="{{ $product->quantity }}"><br><br>


        <input type='submit' value='submit'>
    </form>
</body>

</html>
