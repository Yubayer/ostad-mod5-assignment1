@extends('layouts.dashboard')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h3><span class="badge badge-warning">{{ __('New Product Create Form') }}</span></h3>
        <a href="{{URL::tokenRoute('product.index')}}">Return back</a>
    </div>

    <div class="card-body">
        <form action="{{route('product.store')}}" method="POST">
            @sessionToken
    
            <div class="mb-3">
                <label for="colTitle" class="form-label">Product Title</label>
                <input type="text" name="title" class="form-control" id="colTitle" placeholder="Product Title" required>
            </div>
            <div class="mb-3">
                <label for="colDesc" class="form-label">Product Description</label>
                <textarea class="form-control" name="description" id="colDesc" rows="3" placeholder="Product Description"></textarea>
            </div>
            <button class="btn btn-primary" type="submit">Create New Product</button>
        </form>
    </div>
</div>
@endsection