@extends('index')

@section('content')
<div class="container">
    <h1>Create Project</h1>
    <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" name="title" required>
        </div>
        <div class="form-group">
            <label for="subtitle">Subtitle:</label>
            <input type="text" class="form-control" name="subtitle">
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" name="description" rows="3" required></textarea>
        </div>
        <div class="form-group">
            <label for="url">Project URL:</label>
            <input type="url" class="form-control" name="url">
        </div>
        <div class="form-group">
            <label for="image_url">Image URL:</label>
            <input type="text" class="form-control" id="image_url" name="image_url">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection