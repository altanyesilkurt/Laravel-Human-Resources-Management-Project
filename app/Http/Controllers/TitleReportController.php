<?php

namespace App\Http\Controllers;

use App\Reports\TitleReport;
use Illuminate\Http\Request;
use App\Title;
use App\Http\Requests\TitleRequest;
class TitleReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('titleReports.index');
    }
    public function gridData(Request $request, TitleReport $report)
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
        return view('titleReports.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TitleRequest $request)
    {
        $data=$request->all();
        Title::create($data);

        return redirect('/titleReports')->
        with('messages','Title added successfully');
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
        $title=Title::find($id);

        return view('titleReports.edit',['title'=>$title]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TitleRequest $request, $id)
    {
        $data=$request->all();

        $title=Title::find($id);
        $title->update($data);

        return redirect('/titleReports')->
        with('messages',  'Title updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Title::destroy($id);

        return redirect('/titleReports')->
        with('messages','Title Updated successfully');

    }
}
