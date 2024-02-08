{{-- Extend your main layout --}}
@extends('index')

@section('content')
<div class="container">
    <h1>Edit Project</h1>
    <form action="{{ route('projects.update', $project->id) }}" method="POST">
        @csrf
        @method('PUT') {{-- Specify the method to be PUT for updating --}}

        {{-- Title field --}}
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $project->title }}" required>
        </div>

        {{-- Subtitle field --}}
        <div class="mb-3">
            <label for="subtitle" class="form-label">Subtitle</label>
            <input type="text" class="form-control" id="subtitle" name="subtitle" value="{{ $project->subtitle }}">
        </div>

        {{-- Description field --}}
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description"
                required>{{ $project->description }}</textarea>
        </div>

        {{-- Image URL field --}}
        <div class="mb-3">
            <label for="image_url" class="form-label">Image Url</label>
            <input type="text" class="form-control" id="image_url" name="image_url" value="{{ $project->image_url }}">
        </div>

        {{-- URL field --}}
        <div class="mb-3">
            <label for="url" class="form-label">Url</label>
            <input type="text" class="form-control" id="url" name="url" value="{{ $project->url }}">
        </div>

        <button type="submit" class="btn btn-primary">Update Project</button>
    </form>
</div>
@endsection