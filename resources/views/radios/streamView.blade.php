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
		<h3 class="card-title">Radio Stream</h3>
	</div>
</div>
<div class="row">
	<div class="col-4">
        <div class="card">
            <div class="card-block">

			    <!-- <video width="400" controls>
			      <source src="<?php //echo $radios['url'];?>" type="video/mp4">
			      <source src="mov_bbb.ogg" type="video/ogg">
			      Your browser does not support HTML5 video.
			    </video> "http://".$server.":".$port."/".$mount;
			    http://localhost:8000/playRadio/1
URL::to('/')."/playRadio/".$radios['id']
			-->
			
			<?php  $url = $stream_url;//URL::to('/').'/playRadio/'.$radios['id'] ;?>
<!-- <iframe src={!! $url !!} ></iframe> -->
<div id="video-player" style="background: url('/image/player.gif')">
	<video width="100%" controls>
	    
    	<source src="{{ URL::to('/').$url }}" type="audio/mpeg">
      	Your browser does not support the video tag.
   </video>
</div>

			</div>
		</div>
	</div>

	<div class="col-8">
        <div class="card">
            <div class="card-block">
				<h3 class="card-title">Secure Stream URL</h3>
					<div class="card" style="background-color: #f2F6F7; padding: 30px;">
						<a href="<?php echo URL::to('/').$url;//echo $radios['url'];?>" target="_blank">
							<?php echo URL::to('/').$url;?></a> 
					</div>
					<h3 class="card-title">Player Code</h3>
					<div class="card" style="background-color: #D4D4D4; padding: 30px;">
						<?php echo htmlentities("<iframe width='400' height='480' src='".URL::to('/').$url."'></iframe>"); ?>
						
					</div>
			</div>
		</div>
	</div>

</div>
	

@endsection