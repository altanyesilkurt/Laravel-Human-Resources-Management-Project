<?php

namespace App\Http\Controllers;
use App\Title;
use App\Http\Requests\TitleRequest;

class TitleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title=Title::orderBy('id') ->when(request()->filled('search'), function($query) {
            $query->where('name','like','%'.(request()->input('search')).'%');

        })
            ->paginate(5);
        return view('titles.index',['titles'=>$title]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('titles.create');
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

        return redirect('/titles')->
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

        return view('titles.edit',['title'=>$title]);
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

        return redirect('/titles')->
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

          return redirect('/titles')->
          with('messages','Title Updated successfully');

    }
}
