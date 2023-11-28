@extends('layouts.dashboard')

@section('content')
<div class="card">
    <div class="card-header">Assignment 1 {{ __('DASHBOARD') }}</div>

    <div class="card-body">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif

        <p>{{ __('You are logged in!') }} as <b>{{ Auth::user()->name }}</b></p>
    </div>
</div>
@endsection