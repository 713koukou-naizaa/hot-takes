extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $sauce->name }}</h1>
    <p><strong>Manufacturer:</strong> {{ $sauce->manufacturer }}</p>
    <p><strong>Description:</strong> {{ $sauce->description }}</p>
    <p><strong>Main Pepper:</strong> {{ $sauce->mainPepper }}</p>
    <p><strong>Heat:</strong> {{ $sauce->heat }}</p>
    <p><strong>Likes:</strong> {{ $sauce->likes }}</p>
    <p><strong>Dislikes:</strong> {{ $sauce->dislikes }}</p>
    <a href="{{ route('sauces.edit', $sauce->id) }}" class="btn btn-warning">Edit</a>
    <form action="{{ route('sauces.destroy', $sauce->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
    <a href="{{ route('sauces.index') }}" class="btn btn-secondary">Back to List</a>
</div>
@endsection