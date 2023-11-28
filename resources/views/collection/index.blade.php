@extends('layouts.dashboard')

@push('css')
    <link href="{{ asset('dashboard/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush

@section('content')
<div class="card">
    <div class="card-header">
        <h4>{{ __('Collection Index') }}</h4>
        <a class="btn btn-warning" href="{{ URL::tokenRoute('collection.create') }}">Create New</a>
    </div>


    <div class="card-body">
    <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>S/L</th>
                        <th>Tigle</th>
                        <th>Handle</th>
                        <th>Product Count</th>
                        <th>Sort Order</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>S/L</th>
                        <th>Tigle</th>
                        <th>Handle</th>
                        <th>Product Count</th>
                        <th>Sort Order</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($collections as $key => $collection)
                        <tr>
                            <td>{{ $key+1 }}</td>    
                            <td>{{ $collection['node']->title }}</td>
                            <td>{{ $collection['node']->handle }}</td>
                            <td>{{ $collection['node']->productsCount }}</td>
                            <td>{{ $collection['node']->sortOrder }}</td>
                            <td>Edit | Delete</td>
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