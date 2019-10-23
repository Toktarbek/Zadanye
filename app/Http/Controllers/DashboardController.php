<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Answer;

class DashboardController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index() 
    {
    	$orders=DB::table('orders')
    		   ->where('ischeck','=',0)
    		   ->orderBY('id','desc')
    		   ->get();

    	return view('managerhome',compact('orders'));
    } 

    public function order($id) 
    {
    	$orders=DB::table('orders')->where('id','=',$id)->first();
    	return view('order',compact('orders','id'));
    } 

    public function update($id) 
    {
    	return view('answer', compact('id'));
    } 

    public function answer(Request $request,$id){

        $temasms=$request->input('tema');
        $mess=$request->input('messages');
        $date_ans = date("Y-m-d");
        $ansewes = new Answer();
        $ansewes->tema = $temasms;
        $ansewes->answer = $mess;
        $ansewes->user_id = $id;
        $ansewes->created_at = $date_ans;
        $ansewes->save();

        $orders=DB::table('orders')
        ->where('id','=',$id)
        ->update(['ischeck'=>1]);

        return redirect('/');
    }

    public function arhive() 
    {
        $orders=DB::table('orders as or')
               ->leftJoin('answers as aa', 'aa.user_id','=','or.id')
               ->select('or.*','aa.user_id','aa.answer','aa.tema as anstema','aa.created_at as ansdate')
               ->where('or.ischeck','=',1)
               ->orderBY('or.id','desc')
               ->get();

        return view('arhive',compact('orders'));
    } 
}
