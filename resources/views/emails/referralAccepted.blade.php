@extends('emails.layouts.app')
@section('title','Welcome To Doral Health Connect ')
@section('content')

    <h1>Dear {{ $details['name'] }}</h1>
    <p> We just wanted to let you know your account on {{ $details['email'] }} has been approved.<br/>
    	<br>
    	Login detail
    	<br>
    	User Name: {{ $details['email'] }}
    	Password: {{ $details['password'] }}
		<br>        
		<br>        
    </p>
		<br>        
    <p>Welcome to DORAL HEALTH CONNECT!</p>
    <p>The doral Team.</p>
@endsection
