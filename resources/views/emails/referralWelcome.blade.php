@extends('emails.layouts.app')
@section('title','Welcome To Doral Health Connect ')
@section('content')

    <h1>Dear {{ $details['name'] }}</h1>
    <p> We're happy you signed up for DORAL HEALTH CONNECT!. To start exploring the DORAL HEALTH CONNECT Please verify your email address</p>
    <br>
    <p><a href="{{ $details['href'] }}"><button>Verify</button></a></p>
    <br>
    <p>From now on, You will receive your login detail in your email, but you could log-in once approved by ADMINISTRATOR. Please be Patience till them.</p>
    <br>
    <p>Welcome to DORAL HEALTH CONNECT!</p>
    <p>The doral Team.</p>
@endsection
