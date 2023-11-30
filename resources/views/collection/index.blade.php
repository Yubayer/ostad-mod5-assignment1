@extends('layouts.dashboard')

@push('css')
    <link href="{{ asset('dashboard/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush

@section('content')
<div class="card">
    <div class="card-header  d-flex justify-content-between">
        <h4>{{ __('All Collections') }}</h4>
        <a class="btn btn-warning" href="{{ URL::tokenRoute('collection.create') }}">Create New Collection</a>
    </div>


    <div class="card-body">
    <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>S/L</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Products</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>S/L</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Products</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($collections as $key => $collection)
                        @php
                            $id = explode("Collection/", $collection['node']->id)[1];
                        @endphp
                        <tr>
                            <td title="{{$collection['node']->id}}">{{$key + 1}}</td>    
                            <td>{{ $collection['node']->title }}</td>
                            <td>{{ $collection['node']->description }}</td>
                            <td>
                                <a href="{{URL::tokenRoute('collection.products', ['id' => $id, 'collection' => $collection['node']->title])}}" class="btn btn-sm btn-primary">{{ $collection['node']->productsCount }} Products</a>
                            </td>
                            <td class="d-flex">
                                <a class="btn btn-sm btn-info mr-2" href="{{URL::tokenRoute('collection.edit', ['id' =>  $id])}}">Edit</a>
                                <form action="{{route('collection.delete')}}" method="POST">
                                    @sessionToken
                                    <input type="hidden" name="host" value="{{getHost()}}">      
                                    <input type="hidden" name="id" value="{{ $collection['node']->id }}">
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