@extends('layouts.dashboard')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-center">
        <h3><span class="badge badge-warning">{{ __('New Collection Create Form') }}</span></h3>
    </div>

    <div class="card-body">
        <form action="{{route('collection.store')}}" method="POST">
            @sessionToken
    
            <div class="mb-3">
                <label for="colTitle" class="form-label">Collection Title</label>
                <input type="text" name="title" class="form-control" id="colTitle" placeholder="Collection Title" required>
            </div>
            <div class="mb-3">
                <label for="colDesc" class="form-label">Collection Description</label>
                <textarea class="form-control" name="description" id="colDesc" rows="3" placeholder="Collection Description"></textarea>
            </div>
            <button class="btn btn-primary" type="submit">Create New</button>
        </form>
    </div>
</div>
@endsection