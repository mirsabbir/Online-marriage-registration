<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nid;
use Illuminate\Validation\ValidationException;
use App\Marriage;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class MarriageController extends Controller
{
    public function dashboard(){
        return view('admin.dashboard');
    }
    public function index(){
        return view('admin.index')->with(['marriages'=> Marriage::latest()->paginate(15)]);
    }
    public function register(Request $request){
        if($request->__page=='witness') {
            if(!$request->session()->has('s1')) return redirect('/admin/marriage/register');
            return view('admin.witness');
        }
        if($request->__page=='religion') {

            if(!$request->session()->has('s2')) return redirect('/admin/marriage/register?__page=witness');
            return view('admin.religion');
        }
        if($request->__page=='payment') {

            if(!$request->session()->has('s3')) return redirect('/admin/marriage/register?__page=religion');
            return view('admin.payment');
        }
        if($request->__page=='complete') {
            if(!$request->session()->has('s4')) return redirect('/admin/marriage/register?__page=payment');

            $m = new Marriage;
            $m->groom_id = Nid::where('no',session('groom_nid'))->first()->id;
            $m->bride_id = Nid::where('no',session('bride_nid'))->first()->id;
            $m->witness1_id = Nid::where('no',session('witness1_nid'))->first()->id;
            $m->witness2_id = Nid::where('no',session('witness2_nid'))->first()->id;
            $m->religion = session('religion');
            $m->prv_groom_id = Nid::where('no',session('groom_prv_wife_nid'))->first()->id;
            $m->prv_bride_id = Nid::where('no',session('bride_prv_husband_nid'))->first()->id;
            $m->dowry = session('dowry');
            $m->admin_id = Auth::id();
            $m->save();
            
            session()->forget('s1');
            session()->forget('s2');
            session()->forget('s3');
            session()->forget('s4');
            return view('admin.complete');
        }
        
        return view('admin.register');

    }
    public function registerPost(Request $request){
        if($request->__page=='witness') {
            if(!$request->session('s1')) return redirect('/admin/marriage/register');
            $this->valid2($request);
            return redirect('/admin/marriage/register?__page=religion');
        }
        if($request->__page=='religion') {
            if(!$request->session()->has('s2')) return redirect('/admin/marriage/register?__page=witness');
            $this->valid3($request);
            return redirect('/admin/marriage/register?__page=payment');
        }
        if($request->__page=='payment') {
            if(!$request->session()->has('s3')) return redirect('/admin/marriage/register?__page=religion');
            $this->valid4($request);
            return redirect('/admin/marriage/register?__page=complete');
        }
        $this->valid($request);
        return redirect('/admin/marriage/register?__page=witness');

    }
    public function divorce(){
        return view('admin.divorce');
    }
    public function update(){
        return view('admin.update');
    }
    private function valid($request){
        
        // $groom  = Nid::where('no',$request->groom_nid)->first();
        // $bride = Nid::where('no',$request->bride_nid)->first();
        // if(!$groom) {
        //     $error = ValidationException::withMessages([
        //         'groom_nid' => ['Groom\'s ID card not valid'],
        //      ]);
        //      throw $error;
        // } else {
        //     if($groom->dob < 21){
        //         $error = ValidationException::withMessages([
        //             'groom_nid' => ['Groom\'s age is under 21'],
        //          ]);
        //          throw $error;
        //     }
        //     if($groom->name != $request->groom_name){
        //         $error = ValidationException::withMessages([
        //             'groom_nid' => ['Groom\'s name not valid'],
        //          ]);
        //          throw $error;
        //     }
        // }
        // if(!$bride) {
        //     $error = ValidationException::withMessages([
        //         'bride_nid' => ['Bride\'s ID card not valid'],
        //      ]);
        //      throw $error;
        // }
        
        $dt = new Carbon();
        $before = $dt->subYears(21)->format('Y-m-d');
        $request->validate([
            // 'groom_name' => 'required',
            // 'bride_name' => 'required',
            // 'groom_nid' => 'required|nid_varify:groom_name,groom_father,groom_mother,groom_dob',
            // 'bride_nid' => 'required|nid_varify:bride_name,bride_father,bride_mother,bride_dob',
            // 'groom_father' => 'required',
            // 'groom_mother' => 'required',
            // 'bride_father' => 'required',
            // 'bride_mother' => 'required',
            'groom_dob' => 'required|date_format:Y-m-d|before:'.$before,
            'bride_dob' => 'required|date_format:Y-m-d',
            // 'groom_prv_wife_name' => 'required_if:__a,1',
            // 'groom_prv_wife_nid' => 'required_if:__a,1',
            // 'groom_prv_wife_approved' => 'required_if:__a,1',
            // 'bride_prv_husband_name' => 'required_if:__b,1',
            // 'bride_prv_husband_nid' => 'required_if:__b,1',
            // '__a' => 'required',
            // '__b' => 'required'
        ]);
        // $groom  = Nid::where('no',$request->groom_nid)->first();
        // $bride = Nid::where('no',$request->bride_nid)->first();
        // $res = Marriage::where('groom_id',$groom->id)->first();

        // if($res){
            
        //     if($res->bride_id!=$request->groom_prv_wife_nid){
        //         $error = ValidationException::withMessages([
        //         'previous marriage groom' => [' error'],
        //         ]);
        //         throw $error;
        //     }
        // }

        // $res = Marriage::where('bride_id',$bride->id)->first();
        // if($res){
        //     if($res->groom_id!=$request->bride_prv_husband_nid){
        //         $error = ValidationException::withMessages([
        //         'previous marriage bride' => [' error'],
        //         ]);
        //         throw $error;
        //     }
        // }
        
        $request->session()->put('groom_name',$request->groom_name);
        $request->session()->put('bride_name',$request->bride_name);
        $request->session()->put('groom_nid',$request->groom_nid);
        $request->session()->put('bride_nid',$request->bride_nid);
        $request->session()->put('groom_father',$request->groom_father);
        $request->session()->put('groom_mother',$request->groom_mother);
        $request->session()->put('bride_father',$request->bride_father);
        $request->session()->put('bride_mother',$request->bride_mother);
        $request->session()->put('groom_dob',$request->groom_dob);
        $request->session()->put('bride_dob',$request->bride_dob);
        $request->session()->put('groom_prv_wife_name',$request->groom_prv_wife_name);
        $request->session()->put('groom_prv_wife_nid',$request->groom_prv_wife_nid);
        $request->session()->put('bride_prv_husband_name',$request->bride_prv_husband_name);
        $request->session()->put('bride_prv_husband_nid',$request->bride_prv_husband_nid);
        $request->session()->put('s1',1);

    }
    private function valid2($request){
        $request->validate([
            // 'witness1_name' => 'required',
            // 'witness2_name' => 'required',
            // 'witness1_nid' => 'required|nid_varify:witness1_name,witness1_father,witness1_mother,witness1_dob',
            // 'witness2_nid' => 'required|nid_varify:witness2_name,witness2_father,witness2_mother,witness2_dob',
            // 'witness1_father' => 'required',
            // 'witness1_mother' => 'required',
            // 'witness2_father' => 'required',
            // 'witness2_mother' => 'required',
            // 'witness1_dob' => 'required|date_format:Y-m-d',
            // 'witness2_dob' => 'required|date_format:Y-m-d',
        ]);
        foreach($request->all() as $res => $val){
            $request->session()->put($res,$val);
        }
        $request->session()->put('s2',1);
        
    }
    private function valid3($request){
        $request->validate([
            'religion' => 'required',
            'divorce_' => 'required_if:religion,1',
            'divorce_condition' => 'required_if:religion,1',
            'dowry' => 'required_if:religion,1',
            'ability_of_divorce' => 'required_if:religion,1',
        ]);
        $request->session()->put('s3',1);
    }
    private function valid4($request){
       
        $request->session()->put('s4',1);
    }
}
