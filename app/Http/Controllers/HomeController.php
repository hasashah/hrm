<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /** Return view to upload file */
    public function uploadFile(){

        return view('uploadfile');
    }

    /** Example of File Upload */
    public function uploadFilePost(Request $request){
        $request->validate([
            'fileToUpload' => 'required|file|max:1024',
        ]);

        $fileName = "fileName".time().'.'.request()->fileToUpload->getClientOriginalExtension();

        $request->fileToUpload->storeAs('hrm',$fileName);

        return back()
            ->with('success','You have successfully upload image.');

    }







}
