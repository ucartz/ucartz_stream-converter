<?php

namespace RadioStream\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;


use Auth;
Use Redirect;
Use Storage;
use RadioStream\RadioStreams;

class RadioController extends Controller
{
    //

    public function radioStreamPost(Request $request){
       $this->validate($request,[
							       	'stream_name'=>'required',
							       	'server'=>'required',
    								'port'=>'required',
    								'mount'=>'required',
                                    'public_private'=> 'required'
                                ]);
    	$radio = new RadioStreams();
    	$radio->stream_name = $request->input('stream_name');
    	$radio->server = $request->input('server');
    	$radio->port = $request->input('port');
    	$radio->mount = $request->input('mount');
    	$radio->public_private = $request->input('public_private');
    	$radio->url = "http://".$request->input('server').":".$request->input('port')."/".$request->input('mount');
    	$radio->userId = Auth::user()->userId;
    	$radio->status = "1";
        //return $request->input('public_private');

    	$radio->save();
    	return redirect('/addedStream/'.$radio->id)->with('response','Radio Added successfully');

    }

    public function addedStreamView($radio_id){
    	$radios = RadioStreams::where('id','=',$radio_id)->first();
        
        $server = $radios['server'];
        $port = $radios['port'];
        $mount = $radios['mount'];
        $url = "http://".$server.":".$port."/".$mount;
        //$f=fopen($url,'r');
        $testData = '<?php header("Content-Type: audio/mpeg");
                    $f=fopen("'.$url.'","r"); 
                    if(!$f) exit;
                    while(!feof($f)){
                        echo fread($f,128);
                        flush();
                    }
                    fclose($f);
                    ?>';
        $base_url = base_path();
        Storage::disk('uploads')->put('radio'.$radio_id.'.php', $testData);

        $stream_url = "/public/radiostreamfiles/radio".$radio_id.".php";
        //@file_put_contents($base_url."/storage/app/radiostreamfiles/radio".$radio_id.".php", $testData);

    	return view('radios.streamView',['radios'=>$radios,'stream_url'=>$stream_url]);
    }
    public function radioStreamList(Request $request){
    	//$radios = RadioStreams::all();
        
        //$public_radios = RadioStreams::where('public_private','=','1')->get();
        //$posts = Post::paginate(3);
        if(Auth::id() == 1){
            //$radios = RadioStreams::all();
            $radios = RadioStreams::paginate(10);
        }else{
            //$radios = RadioStreams::where('public_private','=','1')->orWhere('userId', '=', Auth::id())->get();
            $radios = RadioStreams::where('public_private','=','1')->orWhere('userId', '=', Auth::id())->paginate(5);
        }

    	
    	return view('radios.list',['radios'=>$radios]);
    }
    public function playRadio($radio_id){
        //echo "jii";exit;
    	$radios = RadioStreams::where('id','=',$radio_id)->first();
    	$server = $radios['server'];
    	$port = $radios['port'];
    	$mount = $radios['mount'];
        $url = "http://".$server.":".$port."/".$mount;

    	return Redirect::to($url);
        

    }
    
    
    public function updateRadio($radio_id, Request $request){
        echo "kookodsfkodsjkffjldsfnmsdnfv";
        $this->validate($request,[
                                    'stream_name'=>'required',
                                    'server'=>'required',
                                    'port'=>'required',
                                    'mount'=>'required',
                                    'public_private'=> 'required'
                                ]);
        $radio = RadioStreams::find($radio_id);//new RadioStreams();
        $radio->stream_name = $request->input('stream_name');
        $radio->server = $request->input('server');
        $radio->port = $request->input('port');
        $radio->mount = $request->input('mount');
        $radio->public_private = $request->input('public_private');
        $radio->url = "http://".$request->input('server').":".$request->input('port')."/".$request->input('mount');
        $radio->userId = Auth::user()->userId;
        $radio->status = "1";
        //return $request->input('public_private');

        $radio->save();
        return redirect('/addedStream/'.$radio->id)->with('response','Radio Updated successfully');
    }
    public function editRadio($radio_id){
        $radios = RadioStreams::where('id','=',$radio_id)->first();
        return view('radios.editRadio',[
                                    'radios'=>$radios
                                    ]);
    }
    public function deleteRadio($radio_id){
    	RadioStreams::where('id', $radio_id)
            ->delete();
        return redirect('/radioList')->with('response','Radio deleted successfully');  
    }
}
