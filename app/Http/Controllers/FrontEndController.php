<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    //
    public function displayJobBoard(){
        return view('jobBoard');
    }

    public function addJobPage(){
        return view('addJobPage');
    }

    public function editJobPage($id){
        return view('editJob',['id' => $id]);
    }
}
