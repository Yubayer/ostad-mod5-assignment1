@extends('layouts.dashboard')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-center">
        <h3><span class="badge badge-warning">{{ __('New Product Create Form') }}</span></h3>
    </div>

    <div class="card-body">
        <form action="{{route('product.update')}}" method="POST">
            @sessionToken
            <input type="hidden" name="id" value="{{$product->admin_graphql_api_id}}">
            <div class="mb-3">
                <label for="colTitle" class="form-label">Product Title</label>
                <input type="text" name="title" class="form-control" id="colTitle" value="{{$product->title}}" placeholder="Product Title" required>
            </div>
            <div class="mb-3">
                <label for="colDesc" class="form-label">Product Description</label>
                <textarea class="form-control" name="description" id="colDesc" rows="3" placeholder="Product Description">
                    {{ $product->body_html }}
                </textarea>
            </div>
            <button class="btn btn-primary" type="submit">Update Product</button>
        </form>
    </div>
</div>
@endsection