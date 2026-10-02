<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>create new product</h1>
    <form action="{{ route('products.store') }}" method="post">
        @csrf
        <label for="name"> Producte Name:</label>
        <input type="text" name='name'><br><br>

        <label for="quantity"> Quantity:</label>
        <input type="number" name='quantity'><br><br>
        <select name="category_id">
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }} </option>
            @endforeach
        </select>

        {{-- <select name='available'>
            <option value='1'>true</option>
            <option value='0'>false</option>
        </select> --}}
        <input type='submit' value='submit'>
    </form>
</body>

</html>
