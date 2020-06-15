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
        $currentRate=Rating::where([['user_id',$currentUserID],['rateable_id',$request->id]]);
        $allProRate=Rating::where('rateable_id',$request->id);
        $rateCount=$allProRate->count();
//$allRates=Rating::all();
//$sum=0.0;
//$count=0;
//foreach ($allRates as $rate){
//    if($rate->rating){
//        $sum=$sum+$rate->rating;
//        $count++;
//    }
//}
//$totalAverage=0.0;
//    if($count!=0)
//    {$totalAverage= $sum/$count;}
        $WR = ($rateCount / ($rateCount+1)) * $user->averageRating + (1 / ($rateCount+1)) * 2.5;

        if($currentRate){
            $currentRate->delete();
        }
        $rating = new \willvincent\Rateable\Rating;
        $rating->rating = $request->rate;
        $rating->user_id = auth()->user()->id;
        $user->ratings()->save($rating);
        $user->rating_average=$WR;
        if($WR>=4){
            $user->state='premium';
        }
        $user->save();
        return redirect()->route('professional.show',[$user->id,'user'=>$user,'rateCount'=>$rateCount]);
    }
}
