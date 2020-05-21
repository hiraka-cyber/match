<?php

namespace App\Http\Controllers;

use App\Edit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EditController extends Controller
{
  public function index()
  {
    $editList = Edit::all();
    return view('edit')->with('editList',$editList);
  }
  public function add()
  {
    if( Auth::check() ){
      $edit = Edit::where('userid',Auth::user()->id)->first();
      return view('findedit')->with('edit',$edit);
    }
    return view('findedit');
  }
  public function store(Request $request)
  {
    $editCheck = Edit::where('userid',Auth::user()->id)->first();
    if($editCheck == null){
      $edit = new Edit;
    }else{
      $edit = Edit::find($editCheck->id);
    }
    $edit->username = Auth::user()->name;
    $edit->userid = $request->user()->id;
    $edit->soft = $request->soft;
    $edit->skill = $request->skill;
    $edit->price = $request->price;
    $edit->situation = $request->situation;
    $edit->description = $request->description;

    $edit->save();
    return redirect('etube');
  }
}
