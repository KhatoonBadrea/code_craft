<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>All Category</h1>

    <a href={{ route('categories.create') }}>create Categories</a><br><br>

    <table border=1>

        <tr>
            <th>category index</th>
            <th> category name</th>
            <th></th>
            <th></th>
        </tr>
        @foreach ($categories as $category)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td> {{ $category->name }}</td>
                <td> <a href="{{ route('categories.edit', $category->id) }}">Edit</a></td>
                <td>
                    <form action="{{ route('categories.destroy', $category->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="delete">
                    </form>
                </td>

            </tr>
        @endforeach
    </table>
</body>

</html>
