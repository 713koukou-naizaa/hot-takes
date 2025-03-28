@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Sauce</h1>
    <form action="{{ route('sauces.update', $sauce->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $sauce->name }}" required>
        </div>
        <div class="form-group">
            <label for="manufacturer">Manufacturer</label>
            <input type="text" name="manufacturer" id="manufacturer" class="form-control" value="{{ $sauce->manufacturer }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" required>{{ $sauce->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="mainPepper">Main Pepper</label>
            <input type="text" name="mainPepper" id="mainPepper" class="form-control" value="{{ $sauce->mainPepper }}" required>
        </div>
        <div class="form-group">
            <label for="heat">Heat</label>
            <input type="number" name="heat" id="heat" class="form-control" value="{{ $sauce->heat }}" min="1" max="10" required>
        </div>
        <button type="submit" class="btn btn-primary">Save Changes</button>
        <a href="{{ route('sauces.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection