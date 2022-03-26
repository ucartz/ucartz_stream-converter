@extends('layouts.app')

@section('content')
<div class="row page-titles">
				    <div class="col-md-6 col-8 align-self-center">
				        <h3 class="text-themecolor m-b-0 m-t-0">Radio Stream</h3>
				    </div>
				    <div class="col-md-6 col-4 align-self-center">

				    </div>
				</div>
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
				    <div class="col-12 listContent">
				        <div class="card">
				            <div class="card-block">
								<h3 class="card-title">Add Radio Stream</h3>
								<form class="col-md-8" action="{{ url('/radioStream') }}" method="get" onsubmit="return validateForm()">
								<!-- <form action="radio-code.php" method="POST" id="radio_form" name="radio_form" onsubmit="return validateForm()"> -->
					            	<div class="form">
							            <div class="form-group row" >
			                                <label class="col-sm-2 text-right control-label col-form-label">Stream Name</label>
			                                <div class="col-sm-4">
			                                    <input type="text" id="stream_name" name="stream_name"  placeholder="Enter Stream Name" class="form-control stream_name" required="true">
			                                </div>
			                            </div>
			                            <div class="form-group row" >
			                                <label class="col-sm-2 text-right control-label col-form-label">Server</label>
			                                <div class="col-sm-4">
			                                    <input type="text" id="server" name="server"  placeholder="Enter your server" class="form-control server" required="true">
			                                </div>
			                            </div>
			                            <div class="form-group row" >
			                                <label class="col-sm-2 text-right control-label col-form-label">Port</label>
			                                <div class="col-sm-4">
			                                    <input type="text" id="port" name="port" placeholder="Enter your port" class="form-control port" required="true">
			                                </div>
			                            </div>
			                            <div class="form-group row" >
			                                <label class="col-sm-2 text-right control-label col-form-label">Mount</label>
			                                <div class="col-sm-4">
			                                    <input type="text" id="mount" name="mount" placeholder="Enter your mount" class="form-control mount" required="true">
			                                </div>
			                            </div>
			                            <div class="form-group row" >
			                                <label class="col-sm-2 text-right control-label col-form-label">Publish</label>
			                                <div class="col-sm-4" style="text-align: left;">
			                                    <!-- <input type="checkbox" id="public_private" name="public_private" class="form-control public_private"> -->
			                                    <div class="form-group">
												    <div class="custom-control custom-radio">
												      <input type="radio" id="public" name="public_private" class="custom-control-input" checked="" value="1">
												      <label class="custom-control-label" for="public" >Public</label>
												    </div>
												    <div class="custom-control custom-radio">
												      <input type="radio" id="private" name="public_private" class="custom-control-input" value="0">
												      <label class="custom-control-label" for="private" >Private</label>
												    </div>
												</div>
			                                </div>
			                            </div>
			                        </div>
			                        <div class="form-group row">
		                                <div class=" col-sm-2"></div>
		                                <div class=" col-sm-4">
		                                    <button type="submit" class="btn btn-info waves-effect waves-light">Generate</button>
		                                </div>
		                            </div>
		                        </form>
				            </div>
				        </div>
				    </div>
				</div>

				<!-- <div class="row">
				    <div class="col-4">
				        <div class="card">
				            <div class="card-block">
								<h3 class="card-title">Add phone call</h3>
								<img src="image/capture.png" alt="" style="height: auto;width: 100%;">
							</div>
						</div>
					</div>
					<div class="col-8">
				        <div class="card">
				            <div class="card-block">
								<h3 class="card-title">Radio Stations</h3>
								<table class="table table-hover">
									<thead>
									    <tr>
									      <th scope="col"><i class="icon-cloud-download"></i></th>
									      <th scope="col"><i class="icon-cloud-upload"></i></th>
									      <th scope="col">STATIONS</th>
									      <th scope="col">GENRE</th>
									      <th scope="col">TYPE</th>
									    </tr>
									</thead>
									<tbody>
									    <tr class="table-active">
									      <td scope="row"></td>
									      <td></td>
									      <td>one</td>
									      <td>two</td>
									      <td>three</td>
									    </tr>
									    <tr>
									      <td scope="row"></td>
									      <td></td>
									      <td>one</td>
									      <td>two</td>
									      <td>three</td>
									    </tr>
									    <tr class="table-primary">
									      <td scope="row"></td>
									      <td></td>
									      <td>one</td>
									      <td>two</td>
									      <td>three</td>
									    </tr>
									    <tr class="table-secondary">
									      <td scope="row"></td>
									      <td></td>
									      <td>one</td>
									      <td>two</td>
									      <td>three</td>
									    </tr>
									    <tr class="table-success">
									      <td scope="row"></td>
									      <td></td>
									      <td>one</td>
									      <td>two</td>
									      <td>three</td>
									    </tr>
									    <tr class="table-danger">
									      <td scope="row"></td>
									      <td></td>
									      <td>one</td>
									      <td>two</td>
									      <td>three</td>
									    </tr>
									    <tr class="table-primary">
									      <td scope="row"></td>
									      <td></td>
									      <td>one</td>
									      <td>two</td>
									      <td>three</td>
									    </tr>
									    <tr class="table-secondary">
									      <td scope="row"></td>
									      <td></td>
									      <td>one</td>
									      <td>two</td>
									      <td>three</td>
									    </tr>
									    <tr class="table-success">
									      <td scope="row"></td>
									      <td></td>
									      <td>one</td>
									      <td>two</td>
									      <td>three</td>
									    </tr>
									    <tr class="table-danger">
									      <td scope="row"></td>
									      <td></td>
									      <td>one</td>
									      <td>two</td>
									      <td>three</td>
									    </tr>
									    <tr class="table-primary">
									      <td scope="row"></td>
									      <td></td>
									      <td>one</td>
									      <td>two</td>
									      <td>three</td>
									    </tr>
									    <tr class="table-secondary">
									      <td scope="row"></td>
									      <td></td>
									      <td>one</td>
									      <td>two</td>
									      <td>three</td>
									    </tr>
									    
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div> -->
@endsection
