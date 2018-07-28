<?php

namespace App\Http\Controllers;

use App\Branch;
use App\Company;
use App\Department;
use App\Http\Requests\CompanyFormRequest;
use Illuminate\Http\Request;

class CompanyController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::orderBy('id') ->when(request()->
        filled('search'), function($query) {
            $query->where('name','like','%'.(request()->input('search')).'%');
        })
            ->paginate(5);
        return view('companies.index', ['companies' => $companies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyFormRequest $request)
    {
        $data = $this->handleRequest($request);

        $a=Company::create($data);

        $department['name']='Administration';
        $department['company_id']=$a['id'];
        Department::create($department);

        $branch['name']='Centre';
        $branch['company_id']=$a['id'];
        $branch['address']=$a['address'];
        Branch::create($branch);

        return redirect('/companies')
            ->with('messages', 'company added successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::find($id);

        return view('companies.edit', ['company' => $company]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyFormRequest $request, $id)
    {
        $data = $this->handleRequest($request);

        $company = Company::find($id);
        $company->update($data);

        return redirect('/companies')
            ->with('messages', 'company updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Company::destroy($id);
        return redirect('/companies')->
        with('messages', 'company deleted successfully');
    }
    public function handleRequest(Request $request)
    {
        $data = $request->input();

        if ($request->hasFile('logo')) {
            $image = $request->file('logo');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('logos', $filename);
            $data['logo'] = $filename;
        }
        return $data;
    }
}
