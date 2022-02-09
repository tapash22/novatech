<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    public function index()
    {
        $partners = Partner::all()->toArray();
        return array_reverse($partners);
    }

    public function store(){
        
    }
 
    // add post
    public function add(Request $request)
    {
        $pname = $request->input('pname');
        $pname = $request->input('pname');
        $pimage = $request->file('pimage')->store('upload');

        $partners = new Partner([
            'pname' => $pname,
            'plink' => $pname,
            'pimage'=> $pimage,
        ]);
        $partners->save();
 
        return response()->json('The partner successfully added');
    }
 
    // edit post
    public function edit($id)
    {
        $partners = Partner::find($id);
        return response()->json($partners);
    }
 
    // update post
    public function update($id, Request $request)
    {
        $partners = Partner::find($id);
        $partners->update($request->all());
 
        return response()->json('The partner successfully updated');
    }
 
    // delete post
    public function delete($id)
    {
        $partners =Partner::find($id);  
        $partners->delete();

        return response()->json('The partner successfully deleted');
    }
}
