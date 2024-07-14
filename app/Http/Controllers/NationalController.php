<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use App\Models\Nationality;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NationalController extends Controller
{
  public function index(){
    $national = Nationality::all();
    return view('admin.national.index',compact('national'));
  }
  public function create(){
    return view('admin.national.create');
  }
  public function store(Request $request){
     $dataCreate = $request->all();
     Nationality::create($dataCreate);
     return redirect()-> route('national.index') ->with('success','created successfully');
  }
  public function  edit(Request $request, $id)
  {
    $national = Nationality::find($id);
    if ($request->isMethod('POST')) {
        $national = $request->except('_token');
        $result = Nationality::where('id', $id)
            ->update($national);
        if ($result) {
            Session::flash('success', 'Edit National Successfully ');
            return redirect()->route('national', ['id'=>$id]);
        }
    }
    return view('admin.national.edit', compact('national'));

  }

  public function delete($id){
     Nationality::where('id', $id)->delete();
     return redirect()->route('national');
  }
}


