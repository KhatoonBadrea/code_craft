<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>All Products</h1>

    <a href="{{ route('available_products') }}">available_products</a><br><br>

    <form action="{{ route('search') }}" method="GET">
        <input type="text" name="find" placeholder="product name">
        <input type="submit" value="search">
    </form>

    <br><br>
    <hr>


    <table border=1>
        <tr>
            <td>product index</td>
            <td>product name</td>
            <td>product quantity</td>
            <td>product available</td>
            <td>category name</td>
            <td>edit</td>
            <td>delete</td>
        </tr>
        @foreach ($products as $product)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->quantity }}</td>
                <td>{{ $product->available }}</td>
                <td>{{ $product->category_id }}</td>
                <td><a href="{{ route('edit', $product->id) }}">edit</a></td>
                <td>
                    <form action="{{ route('delete', $product->id) }}" method=post>
                        @csrf
                        @method('delete')
                        <input type="submit" value="delete">
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

</body>

</html>
