@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12 listContent">
        <div class="card">
            <div class="card-block">
				<h3 class="card-title">Edit Radio Stream</h3>
				<form class="col-md-8"  method="POST"  action="{{ url('updateRadio/'.$radios->id) }}" onsubmit="return validateForm()">
                    @csrf
				<!-- <form action="radio-code.php" method="POST" id="radio_form" name="radio_form" onsubmit="return validateForm()"> -->
	            	<div class="form">
			            <div class="form-group row" >
                            <label class="col-sm-2 text-right control-label col-form-label">Stream Name</label>
                            <div class="col-sm-4">
                                <input type="text" id="stream_name" name="stream_name"  placeholder="Enter Stream Name" class="form-control stream_name" value="{{ $radios->stream_name }}">
                            </div>
                        </div>
                        <div class="form-group row" >
                            <label class="col-sm-2 text-right control-label col-form-label">Server</label>
                            <div class="col-sm-4">
                                <input type="text" id="server" name="server"  placeholder="Enter your server" class="form-control server" value="{{ $radios->server }}">
                            </div>
                        </div>
                        <div class="form-group row" >
                            <label class="col-sm-2 text-right control-label col-form-label">Port</label>
                            <div class="col-sm-4">
                                <input type="text" id="port" name="port" placeholder="Enter your port" class="form-control port" value="{{ $radios->port }}">
                            </div>
                        </div>
                        <div class="form-group row" >
                            <label class="col-sm-2 text-right control-label col-form-label">Mount</label>
                            <div class="col-sm-4">
                                <input type="text" id="mount" name="mount" placeholder="Enter your mount" class="form-control mount" value="{{ $radios->mount }}">
                            </div>
                        </div>
                        <div class="form-group row" >
                            <label class="col-sm-2 text-right control-label col-form-label">Publish</label>
                            <div class="col-sm-4" style="text-align: left;">
                                <div class="form-group">
								    <div class="custom-control custom-radio">
								      <input type="radio" id="public" name="public_private" class="custom-control-input"  <?php if($radios->public_private=='1'){echo 'checked';}// echo ($radios->public_private=='1')?'checked':'' ?>>
								      <label class="custom-control-label" for="public" >Public</label>
								    </div>
								    <div class="custom-control custom-radio">
								      <input type="radio" id="private" name="public_private" class="custom-control-input" <?php if($radios->public_private=='0'){echo 'checked';}//echo ($radios->public_private=='0')?'checked':'' ?>>
								      <label class="custom-control-label" for="private" >Private</label>
								    </div>
								</div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class=" col-sm-2"></div>
                        <div class=" col-sm-4">
                            <button type="submit" class="btn btn-info waves-effect waves-light" ng-disabled="editDorm.$invalid">Generate</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection