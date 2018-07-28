<?php

namespace App\Http\Controllers;
use App\Company;
use App\Department;
use App\Http\Requests\DepartmentFormRequest;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $departments = Department::with('company')->orderBy('id')
            ->when(request()->filled('search'), function($query) {
                $query->where('name','like','%'.(request()->input('search')).'%');
            })
            ->paginate(5);
        return view('departments.index', ['departments' => $departments]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::pluck('name','id');

        return view('departments.create',compact('companies', $companies));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DepartmentFormRequest $request)
    {
        $data = $request->input();
        Department::create($data);

        return redirect('/departments')->
        with('messages', 'Department added successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $department = Department::find($id);

        $companies = Company::pluck('name', 'id');

        return view('departments.edit', ['department' => $department],

            compact('companies', $companies));
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

        $department=Department::find($id);
        $department->update($data);

        return redirect('/departments')->with('messages','Department updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Department::destroy($id);

        return redirect('/departments')->
        with('messages',  'Department deleted successfully');
    }

}
