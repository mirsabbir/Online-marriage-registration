<?php

namespace App\Http\Controllers;

use App\Nid;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class NidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('nid.index')->with(['nids'=>Nid::paginate(15)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('nid.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'name_bng' => 'required',
            'dob' => 'required',
            'fathers_name' => 'required',
            'mothers_name' => 'required',
            'division' => 'required',
            'district' => 'required',
            'upozilla' => 'required',
            'sex' => 'required',
            'img' => 'required'
        ]);
        $n = new Nid;
        $n->name_eng = $request->name;
        $n->name = $request->name_bng;
        $n->dob = $request->dob;
        $n->fathers_name = $request->fathers_name;
        $n->mothers_name = $request->mothers_name;
        $n->division = $request->division;
        $n->district = $request->district;
        $n->upozilla = $request->upozilla;
        $img = Image::make($request->file('img'));
        $name = time().'.'.$request->file('img')->getClientOriginalExtension();
        $img->save($name);
        $n->no = '1000'.time();
        $n->sex = $request->sex;
        $n->img = $name;
        $n->save();
        return redirect('/superadmin/nids');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Nid  $nid
     * @return \Illuminate\Http\Response
     */
    public function show(Nid $nid)
    {
        return view('nid.show')->with(['nid'=>$nid]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Nid  $nid
     * @return \Illuminate\Http\Response
     */
    public function edit(Nid $nid)
    {
        return view('nid.edit')->with(['nid'=>$nid]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Nid  $nid
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nid $nid)
    {
        
        $nid->name_eng = $request->name;
        $nid->name = $request->name_bng;
        $nid->dob = $request->dob;
        $nid->fathers_name = $request->fathers_name;
        $nid->mothers_name = $request->mothers_name;
        $nid->division = $request->division;
        $nid->district = $request->district;
        $nid->upozilla = $request->upozilla;

        if($request->hasFile('img')){
            $img = Image::make($request->file('img'));
            $name = time().'.'.$request->file('img')->getClientOriginalExtension();
            $img->save($name);
            $nid->img = $name;
        }
        
        
        
        $nid->sex = $request->sex;
        
        $nid->save();
        return redirect('superadmin/nids/'.$nid->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Nid  $nid
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nid $nid)
    {
        $nid->delete();
        return redirect('/superadmin/nids');
    }
}
