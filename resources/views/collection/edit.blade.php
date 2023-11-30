@extends('layouts.dashboard')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-center">
        <h3><span class="badge badge-warning">{{ __('Edit Collection Form') }}</span></h3>
    </div>

    <div class="card-body">
        <form action="{{route('collection.update')}}" method="POST">
            @sessionToken
            <input type="hidden" name="id" value="{{$collection->admin_graphql_api_id}}">
            <div class="mb-3">
                <label for="colTitle" class="form-label">Collection Title</label>
                <input type="text" name="title" class="form-control" id="colTitle" value="{{$collection->title}}" placeholder="Collection Title" required>
            </div>
            <div class="mb-3">
                <label for="colDesc" class="form-label">Collection Description</label>
                <textarea class="form-control" name="description" id="colDesc" rows="3" placeholder="Collection Description">{{$collection->body_html}}</textarea>
            </div>
            <button class="btn btn-primary" type="submit">Update Collection</button>
        </form>
    </div>
</div>
@endsection