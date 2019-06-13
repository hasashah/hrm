<?php

namespace App\Http\Controllers;

use App\Cellnumber;
use App\Http\Requests\CellnumberFormRequest;
use Illuminate\Http\Request;

class CellnumberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $cellnumbers=Cellnumber::all();

        return view('cellnumbers.index')->with('cellnumbers', $cellnumbers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cellnumbers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CellnumberFormRequest $request
     * @return void
     */
    public function store(CellnumberFormRequest $request)
    {
        $data = $request->all();
        Cellnumber::create($data);
        return redirect()->route('cellnumbers.index')->withMessage('Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cellnumber  $cellnumber
     * @return \Illuminate\Http\Response
     */
    public function show(Cellnumber $cellnumber)
    {
        return view('cellnumbers.show')->with('cellnumber', $cellnumber);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cellnumber  $cellnumber
     * @return \Illuminate\Http\Response
     */
    public function edit(Cellnumber $cellnumber)
    {
        return view('cellnumbers.edit')->with('cellnumber',$cellnumber);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cellnumber  $cellnumber
     * @return \Illuminate\Http\Response
     */
    public function update(CellnumberFormRequest $request, Cellnumber $cellnumber)
    {
        //dd('hello');

        $data=$request->all();
        $cellnumber->update($data);
        $request->session()->flash('message', 'Successfully modified the information!');
        return redirect('cellnumbers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cellnumber $cellnumber
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Cellnumber $cellnumber)
    {
        $cellnumber->delete();

        return redirect('cellnumbers')->withMessage('Deleted Successfully "'.$cellnumber->firstname ." ".$cellnumber->lastname.'"');
    }
}
