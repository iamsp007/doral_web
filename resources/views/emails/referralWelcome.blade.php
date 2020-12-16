@extends('emails.layouts.app')
@section('title','Welcome Your Name')
@section('content')
    <h1>{{ $details['name'] }}</h1>
    <p>{{ $details['email'] }}</p>
    <p>Thank you</p>
@endsection
