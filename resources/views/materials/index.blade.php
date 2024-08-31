<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Materials</title>
</head>

<body>
    @extends('layouts.app')

    @section('content')
    <div class="container">
        <h1>Materials</h1>
        <a href="{{ route('materials.create') }}" class="btn btn-primary">Add Material</a>
        <a href="{{ route('material-transactions.create') }}" class="btn btn-secondary">Add Transaction</a>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>Category</th>
                    <th>Name</th>
                    <th>Opening Balance</th>
                    <th>Current Balance</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($materials as $material)
                <tr>
                    <td>{{ $material->category->name }}</td>
                    <td>{{ $material->name }}</td>
                    <td>{{ $material->opening_balance }}</td>
                    <td>{{ $material->current_balance }}</td>
                    <td>
                        <a href="{{ route('materials.edit', $material) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('materials.destroy', $material) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endsection
</body>

</html>