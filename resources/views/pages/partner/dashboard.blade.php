@extends('pages.layouts.app')

@section('content')
    Welcome {{ \Illuminate\Support\Facades\Auth::guard('partner')->user()->name }}
@endsection
