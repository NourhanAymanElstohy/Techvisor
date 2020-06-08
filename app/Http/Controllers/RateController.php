<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use willvincent\Rateable\Rating;

class RateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */



    public function createRate($id)
    {
        $user = User::find($id);
        return view('rate',compact('user'));
    }

    public function postRate(Request $request)
    {
        request()->validate(['rate' => 'required']);
        $user = User::find($request->id);
        $currentUserID=auth()->user()->id;
        $currentRate=Rating::where('user_id',$currentUserID);
        if($currentRate){
            $currentRate->delete();
        }
        $rating = new \willvincent\Rateable\Rating;
        $rating->rating = $request->rate;
        $rating->user_id = auth()->user()->id;
        $user->ratings()->save($rating);
        return redirect()->route('professional.show',[$user->id,'user'=>$user]);
    }
}
