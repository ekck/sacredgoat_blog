@extends('layouts.admin')
@section('title','Welcome')

@section('body')
	@if(session('message'))
       <div class="alert alert-success">
            {{ session('message') }}
       </div>
	@endif

@endsection
