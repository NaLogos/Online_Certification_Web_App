<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;



class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $twoHoursAgo = date('Y-m-d H:i:s',strtotime('-1 hours'));  //Adjusting for the +1 hour diffrence between date() methode and time in morocco
        $now = date('Y-m-d H:i:s',strtotime('+1 hours'));     
        
        $user = auth()->user();
        
        $upcomingSessions = $user->sessions->where('active_at', '>', $now);
        
        $currentSessions = $user->sessions->whereBetween('active_at', array($twoHoursAgo,$now));
        $currentUntakenSessions = array();
        foreach($currentSessions as $session){
            if(!$session->sessionResults->first()){
                array_push($currentUntakenSessions, $session);
            }
        }

     
        $results = $user->userResults;
    
        
        return view('client.home', compact('user', 'results', 'upcomingSessions', 'currentUntakenSessions'));

    }

    public function redirect()
    {
        if (auth()->user()->is_admin || auth()->user()->is_expert) {
            return redirect()->route('admin.home')->with('status', session('status'));
        }

        return redirect()->route('client.home')->with('status', session('status'));
    }
}
