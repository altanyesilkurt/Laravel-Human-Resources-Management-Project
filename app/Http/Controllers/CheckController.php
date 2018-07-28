<?php

namespace App\Http\Controllers;
use App\Check;
use App\Http\Requests\ChequeFormRequest;
use Illuminate\Http\Request;

class CheckController extends Controller
{
    public function index()
    {
        return view('check.index');
    }
    public function store(ChequeFormRequest $request)
    {
        $data = $request->input();

        Check::create($data);

        return redirect('/check');
    }
    function showTotal($amount) {
        $amount+=amount;
        return $amount;
    }
   public function show(){
        return view('chequeVue.index');
   }
}
