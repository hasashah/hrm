<?php

namespace App\Http\Controllers;

use App\Employeedetail;
use App\Http\Requests\EmployeedetailFormRequest as EmployeedetailFormRequestAlias;
use App\Http\Requests\EmployeedetailFormRequest;
use Illuminate\Http\Request;

class EmployeedetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employeedetails=Employeedetail::all();
        return view('employeedetails.index')->with('employeedetails', $employeedetails);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employeedetails.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param EmployeedetailFormRequest $request
     * @return void
     */
    public function store(EmployeedetailFormRequest $request)
    {
        try{
            //dd($request->picture);
            //$data = $request->except('picture', 'skills', 'hobby');Input::all();
            $data = $request->all();
            $fileName = "fileName_".request()->picture->getClientOriginalName()."_".time().'.'.request()->picture->getClientOriginalExtension();
            //$data['picture'] = $fileName;
            $path = $request->picture->storeAs('hrm',$fileName);
            $data['picture'] = $path;
            $data['skills'] = serialize($request->skills);
            $data['hobby'] = serialize($request->hobby);
            Employeedetail::create($data);
            return redirect()->route('employeedetails.index')->withStatus('Created Successfully!');
        }catch (QueryException $exception){
            return redirect()->back()->withInput()->withErrors($exception->getMessage());
        }

    }


    /** Example of File Upload */
    public function uploadFilePost( $request){
       // dd();
//        $request->validate([
//            'picture' => 'required|file|max:1024',
//        ]);

        $fileName = "fileName_".request()->picture->getClientOriginalName()."_".time().'.'.request()->picture->getClientOriginalExtension();

        $request->storeAs('hrm',$fileName);

        return back()
            ->with('success','You have successfully upload image.');

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Employeedetail  $employeedetail
     * @return \Illuminate\Http\Response
     */
    public function show(Employeedetail $employeedetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employeedetail  $employeedetail
     * @return \Illuminate\Http\Response
     */
    public function edit(Employeedetail $employeedetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employeedetail  $employeedetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employeedetail $employeedetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employeedetail  $employeedetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employeedetail $employeedetail)
    {
        //
    }
}
