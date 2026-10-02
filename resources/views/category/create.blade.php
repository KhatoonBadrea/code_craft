<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>craete new category</h1>

    <form action="{{ route('categories.store') }}" method="post">
        @csrf
        <label for="name"> Category Name</label>
        <input type="text" name='name'><br><br>
        <input type="submit" value="submit">
    </form>
</body>

</html>
