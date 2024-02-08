@extends('index')
@section('content')
<div class="container">
    <h2 class="mt-5 mb-4">Projects</h2>
    @if (Auth::check() && Auth::user()->is_admin)
    <a href="{{ route('projects.create') }}" class="btn btn-success mb-3">Create Project</a>
    @endif
    <div class="row row-cols-1 row-cols-md-2 g-4">
        @foreach ($projects as $project)
        <div class="col">
            <div class="card h-100">
                <img src="{{ $project->image_url }}" class="card-img-top" alt="Project Image">
                <div class="card-body">
                    <h5 class="card-title">{{ $project->title }}</h5>
                    <p class="card-subtitle mb-2 text-muted">{{ $project->subtitle }}</p>
                    <p class="card-text">{{ $project->description }}</p>
                </div>
                <div class="card-footer d-flex justify-content-between align-items-center">
                    <a href="{{ $project->url }}" class="btn btn-primary">View</a>
                    @if (Auth::check() && Auth::user()->is_admin)
                    <!-- User is authenticated -->
                    <div class="btn-group" role="group">
                        <p>Welcome, {{ Auth::user()->name }}</p>
                        <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-danger">Edit</a>
                        @if (Auth::check() && Auth::user()->is_admin)
                        <!-- DELETE START -->
                        <form action="{{ route('projects.destroy', $project->id) }}" method="POST"
                            onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-warning">Delete</button>
                        </form>
                        <!-- @endif -->
                        <!-- DELETE END -->
                        <!-- <button class="btn btn-danger">Edit</button> -->
                        <!-- <button class="btn btn-warning">Delete</button> -->
                    </div>
                    @else
                    <!-- User is not authenticated -->
                    <p>only Admin users can Edit or delete a project</p>

                    @endif
                </div>
            </div>

        </div>
        @endforeach
    </div>

</div>
@endsection