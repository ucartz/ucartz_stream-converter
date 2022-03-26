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
				<h3 class="card-title">Radio Stream</h3>
				 @if(count($radios)>0)
                   
                 <a href="{{route('home')}}" class="btn btn-info waves-effect waves-light pull-right ">Create Stream</a>    
				<table class="table table-hover">
					<thead>
					    <tr>
					      <th scope="col">Play</th>
					      <th scope="col">Stream Name</th>
					      <th scope="col">Server</th>
					      <th scope="col">Port</th>
					      <th scope="col">Mount</th>
					      <th scope="col">view</th>
					      
					      @if(Auth::user()->role == 'admin')
					      <th scope="col">Edit</th>
					      <th scope="col">Delete</th>
					      @endif
					    </tr>
					</thead>
					<tbody>
						<?php $i=1;?>
						@foreach($radios as $radio)
					    <tr class="table-active">
					      <td scope="row">
					      	<!-- <a href='{{url("/playRadio/{$radio->id}")}}'><i class="fa fa-play-circle" aria-hidden="true"></i></a> -->
					      	

								<audio class="audio" id="audio<?php echo $i;?>" src="{{$radio->url}}"   autostart="0"></audio>
								    <a onclick="playSound(this.className);" href="#" id="play_btn<?php echo $i; ?>" class="<?php echo $i; ?>"> <i class="fa fa-play-circle" aria-hidden="true"></i></a>
								    <a onclick="stopSound(this.className);" href="#" id="pause_btn<?php echo $i; ?>" class="<?php echo $i; ?>" style="display: none;"> <i class="fa fa-pause"  aria-hidden="true"></i></a>
					      </td>
					      <td>{{$radio->stream_name}}</td>
					      <td>{{$radio->server}}</td>
					      <td>{{$radio->port}}</td>
					      <td>{{$radio->mount}}</td>
					      <td><a href='{{url("/addedStream/{$radio->id}")}}'>View</a></td>
					      @if(Auth::id() == 1)
					      
					      <td><a href='{{url("/editRadio/{$radio->id}")}}'>Edit</a></td>
					      <td><a href='{{url("/deleteRadio/{$radio->id}")}}'>delete</a></td>
					      @endif
					    </tr>
					    <?php $i++;?>
					    @endforeach
					    
					    	
					</tbody>
				</table>
				@else
        			<p>No Radio Streams Available</p>
                @endif
                <div class="row">
                	<div class="col-md-12">
                		{{ $radios->links() }}
                	</div>
                </div>
                <!-- <div class="txt-center"></div> -->
			</div>
		</div>
	</div>
</div>
<script>
$(window).load(function(){ 
	var soundin = document.getElementsByClassName("audio");
	soundin.pause();
	soundin.currentTime = 0;
});
</script>

<script>

function playSound(classname) {
	var idname="audio"+classname;
      var sound = document.getElementById(idname);
      sound.play();
      $('#play_btn'+classname).hide();
      $('#pause_btn'+classname).show();
  }
 function stopSound(classname) {
 	var idname="audio"+classname;
      var sound = document.getElementById(idname);
      sound.pause();
      $('#pause_btn'+classname).hide();
      $('#play_btn'+classname).show();
  }
</script>

@endsection