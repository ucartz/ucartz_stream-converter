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
				<h3 class="card-title">User Profile</h3>
<div class="row">                        
<div class="col-md-3">
    <?php if($users->photo!=""){?>
        <img src="{{$users->photo}}" alt="">
    <?php }?>
</div>
<div class="col-md-6">
                        <table class="table table-hover">
  <thead>
   <!--  <tr>
     <th scope="col">Column heading</th>
     <th scope="col">Column heading</th>
   </tr> -->
  </thead>
  <tbody>
    <!-- <tr>
        <td>
            <img src="{{$users->photo}}" alt="">
        </td>
    </tr> -->
    <tr class="table-active">
      <th scope="row">{{ __('Name') }}</th>
      <td>{{$users->name}}</td>
    </tr>
    <tr class="table-danger">
      <th scope="row">{{ __('E-Mail Address') }}</th>
      <td>{{$users->email}}</td>
    </tr>
    <tr class="table-primary">
      <th scope="row">{{ __('Mobile') }}</th>
      <td>{{$users->mobile}}</td>
    </tr>
    <tr class="table-warning">
      <th scope="row">{{ __('mobile') }}</th>
      <td>Column content</td>
    </tr>
    <tr class="table-secondary">
      <th scope="row">{{ __('Address') }}</th>
      <td>{{$users->address}}</td>
    </tr>

    <tr class="table-success">
      <th scope="row">{{ __('Country') }}</th>
      <td>{{$users->country}}</td>
    </tr>
    <tr class="table-dark">
      <th scope="row">{{ __('Status') }}</th>
      <td><?php if($users->status==1){echo "Active";}else{echo "Inactive";} ?></td>
    </tr>
    <!-- <tr>
        <td>
            <a href="{{ URL::previous() }}" class="btn btn-info waves-effect waves-light pull-right">Back</a>
            
        </td>
    </tr> -->
  </tbody>
</table>
</div>
<div class="col-md-3">
    <a href="{{ URL::previous() }}" class="btn btn-info waves-effect waves-light">Back</a>
    <a href='{{url("/editUser/{$users->userId}")}}' class="btn btn-info waves-effect waves-light">Edit Profile</a>
</div>
</div>

                        <!-- <div class="form-group row">
                            <div class="col-md-4">
                            <label for="name" class="col-form-label text-md-right">{{ __('Name') }}</label>
                            </div>
                            <div class="col-md-6">
                                {{$users->name}}
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                        
                            <div class="col-md-6">
                                {{$users->email}}
                            </div>
                        </div>
                        
                        
                        
                        <div class="form-group row">
                            <label for="mobile" class="col-md-4 col-form-label text-md-right">{{ __('Mobile') }}</label>
                        
                            <div class="col-md-6">
                                {{$users->mobile}}
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>
                        
                            <div class="col-md-6">
                                {{$users->adress}}
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="country" class="col-md-4 col-form-label text-md-right">{{ __('Country') }}</label>
                        
                            <div class="col-md-6">
                                {{$users->country}}
                            </div>
                        </div> -->
    
			</div>
		</div>
	</div>
</div>
@endsection