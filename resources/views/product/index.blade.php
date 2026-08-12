<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>All Products</h1>

    <table border=1>
        <tr>
            <td>product index</td>
            <td>product name</td>
            <td>product quantity</td>
            <td>product available</td>
        </tr>
        @foreach ($products as $product)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->quantity }}</td>
                <td>{{ $product->available }}</td>
            </tr>
        @endforeach
    </table>

</body>

</html>
