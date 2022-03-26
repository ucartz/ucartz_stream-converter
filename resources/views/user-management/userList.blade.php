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
            <div class="card-block">
				<h3 class="card-title">User Management</h3>
				 @if(count($all_users)>0)
                   
                 <a href='{{url("/addUserform/")}}' class="btn btn-info waves-effect waves-light pull-right ">Create User</a>    
				<table class="table table-hover">
					<thead>
					    <tr>
					      <th scope="col">UserName</th>
					      <th scope="col">Email</th>
					      <th scope="col">Mobile</th>
					      <th scope="col">Address</th>
					      <th scope="col">Country</th>
					      <th scope="col">View</th>
					      <th scope="col">Edit</th>
					      <th scope="col">Delete</th>
					    </tr>
					</thead>
					<tbody>
						@foreach($all_users as $user)
							@if($user->name != 'admin')
						    <tr class="table-active">
						      <td>{{$user->name}}</td>
						      <td>{{$user->email}}</td>
						      <td>{{$user->mobile}}</td>
						      <td>{{$user->address}}</td>
						      <td>{{$user->country}}</td>
						      <td><a href='{{url("/viewUser/{$user->userId}")}}'>View</a></td>
						      
						      @if(Auth::user()->role == 'admin')
						      <td><a href='{{url("/editUser/{$user->userId}")}}'>Edit</a></td>
						      <td><a href='{{url("/deleteUser/{$user->userId}")}}'>delete</a></td>
						      @endif
						    </tr>
						    @endif
					    @endforeach
					    
					    	
					</tbody>
				</table>
				@else
        			<p>No Users Available</p>
                @endif
                <div class="row">
                	<div class="col-md-12">
                		{{ $all_users->links() }}
                	</div>
                </div>
                <!-- <div class="txt-center"></div> -->
			</div>
		</div>
	</div>
</div>
@endsection