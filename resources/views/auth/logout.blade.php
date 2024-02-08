@extends('index')
@section('content')
<div class="container">
    <h1>Logout</h1>
    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
        @csrf
        <!-- CSRF protection -->
        <button type="submit" class="btn btn-link">Logout</button>
    </form>

</div>



@endsection