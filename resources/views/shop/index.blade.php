@extends('layouts.dashboard')

@section('content')
<div class="card">
    <div class="card-header">{{ __('Shop Details') }}</div>

    <div class="card-body">
        <h4>Shop Name: <strong class="badge bg-warning">{{ $shop->name }}</strong> </h4>
        
        <h4>Shop Id: <strong class="badge bg-warning">{{ $shop->id }}</strong></h4>
    </div>
</div>
@endsection