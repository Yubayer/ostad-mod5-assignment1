@extends('layouts.dashboard')

@push('css')
    <link href="{{ asset('dashboard/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h4>All Products Within <b><q>{{$collection}}</q></b> Collection</h4>
        <a class="btn btn-warning" href="{{ URL::tokenRoute('product.create') }}">Create New Product</a>
    </div>


    <div class="card-body">
    <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>S/L</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>S/L</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($products as $key => $product)
                        <tr>
                            <td>{{$key+1}}</td>    
                            <td>{{ $product->title }}</td>
                            <td>{!! $product->body_html !!}</td>
                            <td class="d-flex">
                                <a class="btn btn-sm btn-info mr-2" href="{{ URL::tokenRoute('product.edit', ['id' => $product->id]) }}">Edit</a>
                                <form action="{{route('product.delete')}}" method="POST">
                                    @sessionToken
                                    <input type="hidden" name="id" value="{{ $product->admin_graphql_api_id }}">
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('script')
<!-- Page level plugins -->
<script src="{{ asset('dashboard/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('dashboard/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('dashboard/js/demo/datatables-demo.js') }}"></script>
@endpush