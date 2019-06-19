<?php

namespace App\Http\Controllers;

use App\Imageslider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImagesliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Imageslider::all();

        return view('imagesliders.index', compact('sliders', $sliders));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('imagesliders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
            'title'=>'required|max:225',
            'picture'=>'required|image',
        ));

        $slider = new Imageslider;
        $slider->title = $request->input('title');

        if ($request->hasFile('picture')) {
            $picture = $request->file('picture');
            $filename = 'slide' . '-' . time() . '.' . $picture->getClientOriginalExtension();
            $location = public_path('images/');
            $request->file('picture')->move($location, $filename);

            $slider->picture = $filename;
        }
        $slider->save();
        return redirect()->route('imagesliders.index')->withMessage('Image Uploaded Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Imageslider  $imageslider
     * @return \Illuminate\Http\Response
     */
    public function show(Imageslider $imageslider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Imageslider  $imageslider
     * @return \Illuminate\Http\Response
     */
    public function edit(Imageslider $imageslider)
    {
        return view('imagesliders.edit',compact('imageslider',$imageslider));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Imageslider $imageslider
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, Imageslider $imageslider)
    {
        $this->validate($request, array(
            'title'=>'required|max:225',
            'picture'=>'required|image'
        ));

        $imageslider->title = $request->title;

        if ($request->hasFile('picture')) {
            $picture = $request->picture;
            $filename = 'slide' . '-' . time() . '.' . $picture->getClientOriginalExtension();
            $location = public_path('images/');
            $request->file('picture')->move($location, $filename);

            $oldFilename = $imageslider->picture;
            $imageslider->picture= $filename;
            if(!empty($imageslider->picture)){
                Storage::delete($oldFilename);
            }
        }

        $imageslider->save();

        $request->session()->flash('message', 'Successfully modified the information!');

        return redirect('imagesliders');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Imageslider $imageslider
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Imageslider $imageslider)
    {
        $imageslider->delete();

        return redirect('imagesliders')->withMessage('Image Deleted Successfully');
    }
}
