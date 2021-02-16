@extends('emails.layouts.app')
@section('title','Welcome To Doral Health Connect ')
@section('content')

    <h1>Hi, {{ $details['name'] }}</h1>
    <p> Thank you for Registering with DORAL HEALTH CONNECT. You will receive your password in your email but you could log-in once approved by ADMINISTRATOR. Please be patient till them<br/>
    </p>
    <p>Thank you</p>
@endsection
