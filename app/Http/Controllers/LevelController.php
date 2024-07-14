<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Level;
use App\Models\User;

class LevelController extends Controller
{
  public function index(){
    $levels = Level::all();
    return view('admin.level.index',compact('levels'));
  }
  public function create(){
    return view('admin.level.create');
  }
  public function store(Request $request){
    $dataCreate = $request->all();
    $user = Level::create($dataCreate);
    return redirect()-> route('level.index')-> with('message','create successfully' );

  }
  public function edit($id){
    $level = Level::findOrFail($id);
    return view('admin.level.edit', compact('level'));
  }
  public function update(Request $request, $id){
    $level = Level::findOrFail($id);
    $dataUpdate = $request->all();
    $level->update($dataUpdate);
    return redirect() -> route('level')->with('message','update successfully' );

  }
  public function delete($id){
    Level::where('id', $id)->delete();
    return redirect() -> route('level.index')->with('message','delete successfully' );
  }
}
