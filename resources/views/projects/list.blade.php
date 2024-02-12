@extends('index')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Projects</div>

                <div class="card-body">
                    @if(Auth::check() && Auth::user()->is_admin)
                    <div class="mb-3">
                        <a href="{{ route('projects.create') }}" class="btn btn-success">Create Project</a>
                    </div>
                    @endif

                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                        @foreach($projects as $project)
                        <div class="col">
                            <div class="card h-100">
                                <img src="{{ $project->image_url }}" class="card-img-top" alt="{{ $project->title }}">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $project->title }}</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">{{ $project->subtitle }}</h6>
                                    <p class="card-text">{{ $project->description }}</p>
                                </div>
                                @if(Auth::check() && Auth::user()->is_admin)
                                <div class="card-footer bg-transparent border-top-0">
                                    <a href="{{ route('projects.edit', $project->id) }}"
                                        class="btn btn-primary btn-sm me-2">Edit</a>
                                    <form action="{{ route('projects.destroy', $project->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Are you sure you want to delete this project?')">Delete</button>
                                    </form>
                                </div>
                                @endif
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection