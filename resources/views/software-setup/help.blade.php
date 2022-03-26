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
				<h2 class="card-title">Help</h2>
                <hr>
                <h4>Introduction</h4>
<p>Welcome to the Secure Stream Converter tutorial. This guide gives you a short overview on how to use Secure Stream Converter. By default you don't have to configure Secure Stream Converter, so you can start directly working with the program.<br/>
In this tutorial, you will learn how to</p>
<ul>
    <li>Download,</li>
    <li>Upload files,</li>
    <li>Set up a directory for streaming account,</li>
    <li>Go to Browser.</li>
</ul>




<h4>IMPORTANT NOTE:</h4>

<p>It is _strongly_ recommended taht your server must be enabled with CURL as well as pre-installed with SSL.</p>
<h4>Choosing the right download</h4>
<p>Download Secure Stream Converter from the official source where the download are enabled!</p>
<h4>Installer version</h4>
<p>As a novice user the installation is safe and easier. With this version you only need to download the file and upload it on a new directory. And later run it and the program will get installed by itself.</p>
<p>Go to a browser of your choice and type www.yourdomainname.com/directory.</p>
<p>Hopefully you should now see the following window where you will have to provide the necessary details and then click on the generate button.  That's it. Now you will redirected to the secured version of the stream supporting HTTPS.</p>
 <p>Congratulations, you've now successfully installed the Secure Stream Converter.</p>
            </div>
        </div>
    </div>
</div>

@endsection