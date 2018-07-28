<?php

namespace App\Http\Controllers;

use App\Reports\BranchReport;
use Illuminate\Http\Request;
use App\Branch;
use App\Company;
use App\Http\Requests\DepartmentFormRequest;
class BranchReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('branchReports.index');
    }
    public function gridData(Request $request, BranchReport $report)
    {
        return $report->getGrid($request);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies=Company::pluck('name','id');

        return view('branchReports.create',compact('companies',$companies));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DepartmentFormRequest $request)
    {
        $data=$request->input();

        Branch::create($data);

        return redirect('/branchReports')->
        with('messages','branch added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $branch=Branch::find($id);

        $companies=Company::pluck('name','id');

        return view('branchReports.edit',['branch' => $branch] ,compact('companies',$companies));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DepartmentFormRequest $request, $id)
    {
        $data=$request->all();

        $branch=Branch::find($id);
        $branch->update($data);

        return redirect('/branchReports')->with('messages','Branch updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Branch::destroy($id);

        return redirect('/branchReports')->with('messages','Branch deleted successfully');
    }
}
