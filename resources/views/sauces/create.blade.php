@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add a New Sauce</h1>
    <form action="{{ route('sauces.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="userId">User ID</label>
            <input type="text" name="userId" id="userId" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="manufacturer">Manufacturer</label>
            <input type="text" name="manufacturer" id="manufacturer" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="mainPepper">Main Pepper</label>
            <input type="text" name="mainPepper" id="mainPepper" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="imageUrl">Image URL</label>
            <input type="text" name="imageUrl" id="imageUrl" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="heat">Heat (1-10)</label>
            <input type="number" name="heat" id="heat" class="form-control" min="1" max="10" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Sauce</button>
        <a href="{{ route('sauces.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection