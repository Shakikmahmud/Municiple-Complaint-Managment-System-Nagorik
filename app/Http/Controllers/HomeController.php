<?php

namespace App\Http\Controllers;
use App\Mail\direct_mail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use PHPUnit\Runner\Exception;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->role == 0) {
            $data = DB::table('up_member')->get();
        }
        else if(Auth::user()->role == 1){
            $mem = DB::table('up_member')->where('user_id', Auth::id())->get();
            $data = DB::table('message')->where('area', $mem[0]->area)->get();
        }
        return view('home', ['data' => $data]);
    }
    public function send_message(Request $request)
    {
        $identity = $request->input('identity');
        if($identity == 'Publish My identity')
            $name = Auth::user()->name;
        else $name = 'Anonymous';
        $member = DB::table('up_member')
                  ->where('id', $request->input('member'))
                  ->get();
        $topic = $request->input('topic');
        $message = $request->input('message');
       DB::table('message')->insert([
                'complainer_name' => $name,
                'user_id' => Auth::id(),
                'topic' => $topic,
                'message' => $message,
                'area' => $member[0]->area,
                'up_member_name' => $member[0]->name,
                 'Time' => Carbon::now(),
            ]);
       return redirect()->route('home');
    }
    public function history()
    {
        
    }
    public function action($complain_id)
    {
        
    }
    public function mail($complain_id) {
        
    }
}
