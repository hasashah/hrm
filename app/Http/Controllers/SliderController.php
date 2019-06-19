<?php

namespace App\Http\Controllers;

use App\Slider;
use Illuminate\Http\Request;
// import the storage facade
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::orderby('id', 'desc')->paginate(10);
        return view('sliders.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sliders.create');
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

        $slider = new Slider;
        $slider->title = $request->input('title');

        if ($request->hasFile('picture')) {
            $picture = $request->file('picture');
            $filename = 'slide' . '-' . time() . '.' . $picture->getClientOriginalExtension();
            $location = public_path('images/');
            $request->file('picture')->move($location, $filename);

            $slider->picture = $filename;
        }
        $slider->save();
        return redirect()->route('sliders.index');





    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slider = Slider::findOrFail($id);
        return view('sliders.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Slider $slider
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id)
    {
        $slider = Slider::find($id);
        $this->validate($request, array(
            'title'=>'required|max:225',
            'picture'=>'required|image'
        ));

        $slider = Slider::where('id',$id)->first();

        $slider->title = $request->input('title');

        if ($request->hasFile('picture')) {
            $picture = $request->file('picture');
            $filename = 'slide' . '-' . time() . '.' . $picture->getClientOriginalExtension();
            $location = public_path('images/');
            $request->file('picture')->move($location, $filename);

            $oldFilename = $slider->picture;
            $slider->picture= $filename;
            if(!empty($slider->picture)){
                Storage::delete($oldFilename);
            }
        }

        $slider->save();

        return redirect()->route('slides.index',
            $slider->id)->with('success',
            'Slider, '. $slider->title.' updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Slider::findOrFail($id);
        Storage::delete($slider->picture);
        $slider->delete();

        return redirect()->route('sliders.index');
    }
}
