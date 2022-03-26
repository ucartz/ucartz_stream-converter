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
            <div class="card-block" style="text-align: center;">
				<h2 class="card-title">System Requirement</h2>
                <hr>
                <div class="row" style="margin-top: 40px;">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <ol style="text-align: left;">
                            <li style="margin-top: 30px;">Should be a CURL enabled server.</li>
                            <li style="margin-top: 30px;">Must be an SSL preinstalled server.</li>
                            <li style="margin-top: 30px;">allow_url_fopen should be "on" in server.</li>
                            <!-- <li style="margin-top: 30px;">allow_url_include should be "on" in server.</li> -->
                        </ol>
                    </div>
                    <div class="col-md-4" style="text-align: left;">
                        <ul style="list-style: none;">
                            <li style="margin-top: 30px;"><a href='{{url("/testCurl/")}}' class="btn btn-info waves-effect waves-light">Test CURL</a></li>
                            <li style="margin-top: 30px;"><br/></li>
                            <li style="margin-top: 20px;"><a href='{{url("/testAllowUrlFopen/")}}' class="btn btn-info waves-effect waves-light">Test allow_url_fopen</a></li>
                            <!-- <li style="margin-top: 20px;"><a href='{{url("/testAllowUrlInclude/")}}' class="btn btn-info waves-effect waves-light">Test allow_url_include</a></li> -->
                        </ul>
                        
                        
                        
                    </div>
                </div>
                <!-- <div class="row" style="margin-top: 40px;">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <label>1. Should be a CURL enabled server.</label>
                        
                    </div>
                    <div class="col-md-3">
                        <a href='{{url("/testCurl/")}}' class="btn btn-info waves-effect waves-light">Test CURL</a>
                    </div>
                </div>
                <div class="row" style="margin-top: 20px;">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <label>2. Must be an SSL preinstalled server.</label>
                        
                    </div>
                    <div class="col-md-3"></div>
                </div>
                <div class="row" style="margin-top: 20px;">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <label>3. allow_url_fopen should be "on" in server.</label>
                        
                    </div>
                    <div class="col-md-3">
                        <a href='{{url("/testAllowUrlFopen/")}}' class="btn btn-info waves-effect waves-light">Test allow_url_fopen</a>
                    </div>
                </div> -->

            </div>
        </div>
    </div>
    <!-- <div class="col-12">
        <div class="card"> -->

            <?php 

//var_dump(curl_version());

//var_dump(ini_get('allow_url_fopen'));


 ?>
       <!--  </div>
           </div> -->
</div>

@endsection