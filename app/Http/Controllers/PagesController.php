<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Order;
use Mail;

class PagesController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index() 
    {
    	$email=Auth::user()->email;
    	$date_order = date("Y-m-d");

    	$query=DB::select("SELECT * FROM orders WHERE email=:email AND created_at=:created_at",['email'=>$email,'created_at'=>$date_order]);

    	$check=(!empty($query))?true:false;

        $data = DB::table('orders as or')
                  ->leftJoin('answers as aa','or.id','=','aa.user_id')
                  ->select('or.tema','or.messages','or.files','or.created_at','aa.tema as anstema','aa.answer','aa.created_at as ansdate')
                  ->where('or.email',$email)
                  ->get();

    	return view('client',compact('check','data'));
    } 

    public function store(Request $request)
    {

    	$name=Auth::user()->name;
    	$email=Auth::user()->email;
    	$temasms=$request->input('tema');
    	$mess=$request->input('messages');
    	$date_order = date("Y-m-d");
    	$orders = new Order();
    	$orders->tema = $request->input('tema');
    	$orders->messages = $request->input('messages');
    	$orders->name = $name;
    	$orders->email = $email;
    	$orders->created_at = $date_order;

    	if ($request->hasfile('files')) {
    		$file = $request->file('files');
    		$extension = $file->getClientOriginalExtension();
    		$filename = time() . '.' . $extension;
    		$file->move('documents', $filename);
    		$orders->files = 'documents/'.$filename;
    	}else{
    		return $request;
    		$orders->files = '';
    	}

    	$orders->save();

    	$check=true;

    	// $manager=DB::table('users')->where('role','=',1)->first();
    	// $memail=$manager->email;

    	// Mail::send('email', ['email'=>$email,'name'=>$name,'temasms'=>$temasms,'mess'=>$mess,'memail'=>$memail], function ($m) use($email,$name,$temasms,$mess,$memail) {
     //        $m->from($email, $name);
     //        $m->to($memail)->subject("Заявка");
     //    });

    	return view('client',compact('check'));
    }
}
