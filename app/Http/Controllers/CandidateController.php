<?php

namespace App\Http\Controllers;

use App\Candidate;
use App\Company;
use App\Http\Requests\CandidateRequest;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $candidates=Candidate::with('company')->orderBy('id')->when(request()->
        filled('search'),function ($query){
            $query->where('name','like','%'.(request()->input('search').'%'));
        })->paginate(5);
        return view('candidates.index',['candidates'=>$candidates]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $companies=Company::pluck('name','id');
         return view('candidates.create',compact('companies'));
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


      return  redirect('/candidates')->
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

        return view('candidates.edit',['candidate'=>$candidate],compact('companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CandidateRequest $request, $id)
    {
        $data = $this->handleRequest($request);

        $candidate = Candidate::find($id);

        $candidate->update($data);


      return redirect('/candidates')->with('messages','Candidate updated successfully');
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

         return redirect('/candidates')->
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
