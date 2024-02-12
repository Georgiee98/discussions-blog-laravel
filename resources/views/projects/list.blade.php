@extends('index')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Projects</div>

                <div class="card-body">
                    @if(Auth::check())
                    @if(Auth::user()->is_admin)
                    <div class="mb-3">
                        <a href="{{ route('projects.create') }}" class="btn btn-primary">Create Project</a>
                    </div>
                    @endif
                    @endif

                    <div class="row">
                        @foreach($projects as $project)
                        <div class="col-md-6 mb-4">
                            <div class="card">
                                <img src="{{ $project->image_url }}" class="card-img-top" alt="{{ $project->title }}">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $project->title }}</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">{{ $project->subtitle }}</h6>
                                    <p class="card-text">{{ $project->description }}</p>
                                    @if(Auth::check() && Auth::user()->is_admin)
                                    <a href="{{ route('projects.edit', $project->id) }}"
                                        class="btn btn-primary btn-sm">Edit</a>
                                    <form action="{{ route('projects.destroy', $project->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Are you sure you want to delete this project?')">Delete</button>
                                    </form>
                                    @endif
                                </div>
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