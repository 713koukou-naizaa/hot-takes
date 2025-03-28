@extends('layouts.app')

@section('content')
<div class="container">
    <h1>All Sauces</h1>
    <a href="{{ route('sauces.create') }}" class="btn btn-primary mb-3">Add New Sauce</a>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Manufacturer</th>
                <th>Heat</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sauces as $sauce)
                <tr>
                    <td>{{ $sauce->name }}</td>
                    <td>{{ $sauce->manufacturer }}</td>
                    <td>{{ $sauce->heat }}</td>
                    <td>
                        <a href="{{ route('sauces.show', $sauce->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('sauces.edit', $sauce->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('sauces.destroy', $sauce->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection