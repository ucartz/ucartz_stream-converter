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
				<h2 class="card-title">Software Management</h2>
                <hr>
                <form method="POST" action="{{ route('saveSoftwareInfo') }}" enctype="multipart/form-data">
                        @csrf

                    <div class="form-group row">
                        <label for="softwarename" class="col-md-4 col-form-label text-md-right">{{ __('Software Name') }}</label>

                        <div class="col-md-6">
                            <input id="softwarename" type="text" class="form-control{{ $errors->has('softwarename') ? ' is-invalid' : '' }}" name="softwarename" value="{{ old('softwarename') }}" required autofocus>

                            @if ($errors->has('softwarename'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('softwarename') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="logo" class="col-md-4 col-form-label text-md-right">{{ __('Logo') }}</label>
                    
                        <div class="col-md-6">
                            <input id="logo" type="file" class="form-control{{ $errors->has('logo') ? ' is-invalid' : '' }}" name="logo" required>
                    
                            @if ($errors->has('logo'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('logo') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary pull-left">
                                {{ __('Submit') }}
                            </button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection