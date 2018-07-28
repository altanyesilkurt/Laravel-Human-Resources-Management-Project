<?php

namespace App\Http\Controllers;
use App\Reports\CandidateReport;
use Illuminate\Http\Request;
use App\Candidate;
use App\Company;
use App\Http\Requests\CandidateRequest;

class CandidateReportController extends Controller
{
    public function index()
    {
        return view('candidateReports.index');
    }
    public function gridData(Request $request, CandidateReport $report)
    {
        return $report->getGrid($request);
    }
    public function create()
    {
        $companies=Company::pluck('name','id');
        return view('candidateReports.create',compact('companies'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CandidateRequest $request)
    {
        $data = $this->handleRequest($request);
        Candidate::create($data);

        return  redirect('/candidateReports')->
        with('messages','Candidate added successfully');
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
        $companies=Company::pluck('name','id');

        $candidate=Candidate::find($id);

        return view('candidateReports.edit',['candidate'=>$candidate],compact('companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $this->handleRequest($request);

        $candidate = Candidate::find($id);

        $candidate->update($data);

        return redirect('/candidateReports')->with('messages','Candidate updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Candidate::destroy($id);
        return redirect('/candidateReports')->
        with('messages','Candidate deleted successfully');
    }
    public function handleRequest(Request $request)
    {
        $data = $request->input();
        if ($request->hasFile('cv')) {
            $cv = $request->file('cv');
            $filename = time() . '.' . $cv->getClientOriginalExtension();
            $cv->storeAs('cv', $filename);
            $data['cv'] = $filename;
        }
        return $data;
    }
        public function getDownload(){
        $file_name = request('file');
        return response()->download('C:\Users\NCS\blog\public\app\public\cv/'.$file_name);
    }

}
