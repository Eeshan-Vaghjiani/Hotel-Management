@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Room</h1>
    <form action="{{ route('room.update', $room->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Room Title</label>
            <input type="text" name="room_title" class="form-control" id="title" value="{{ $room->room_title }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control" id="description" rows="4">{{ $room->description }}</textarea>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" name="price" class="form-control" id="price" value="{{ $room->price }}" required>
        </div>

        <div class="mb-3">
            <label for="wifi" class="form-label">Free Wifi</label>
            <select name="wifi" class="form-select" id="wifi">
                <option value="yes" {{ $room->wifi == 'yes' ? 'selected' : '' }}>Yes</option>
                <option value="no" {{ $room->wifi == 'no' ? 'selected' : '' }}>No</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="room_type" class="form-label">Room Type</label>
            <input type="text" name="room_type" class="form-control" id="room_type" value="{{ $room->room_type }}">
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Image URL</label>
            <input type="text" name="image" class="form-control" id="image" value="{{ $room->image }}">
        </div>

        <button type="submit" class="btn btn-primary">Update Room</button>
    </form>
</div>
@endsection
