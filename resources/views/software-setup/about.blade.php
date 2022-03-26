@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-xs-12">
		@if(count($errors)>0)
        @foreach($errors->all() as $error)
        <div class="alert alert-danger">{{$error}}</div>
        @endforeach
        @endif
        @if(session('response'))
            <div class="alert alert-danger">{{session('response')}}</div>
        @endif
	</div>
</div>
<div class="row">
	<div class="col-12">
        <div class="card">
            <div class="card-block" >
				<h2 class="card-title">About</h2>
                <hr>

                <p>Secure Stream Converter is a fast and reliable software with lots of useful features and an intuitive graphical user interface. This is the Beta version 0.0.1 Secure Stream Converter.</p>
                <h4>Features</h4>
                <p>Among others, the features of Secure Stream Converter include the following:</p>
                <ul>
                    <li>Easy to use</li>
                    <li>Generating shoutcast streaming account</li>
                    <li>Converts a non SSL version to SSL version</li>
                    <li>Supports multi-user </li>
                    <li>Can be self-hosted </li>
                    <li>Plug and Play type of installation</li>
                    <li>Supported on all web browsers</li>
                    <li>Cross-platform. Runs on Windows, Linux, *BSD, Mac OS X and more</li>
                    <li>Language PHP Laravel 5.7</li>
                    <li>database used MySql</li>
                </ul>


                
            </div>
        </div>
    </div>
</div>

@endsection