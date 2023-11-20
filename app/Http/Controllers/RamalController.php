<?php

namespace App\Http\Controllers;

use App\Http\Requests\RamalStoreRequest;
use App\Http\Requests\RamalUpdateRequest;
use App\Models\Ramal;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RamalController extends Controller
{
    public function index(Request $request): View
    {
        $ramals = Ramal::all();

        return view('ramal.list', compact('ramals'));
    }

    public function create(Request $request): View
    {
        return view('ramal.form');
    }

    public function store(RamalStoreRequest $request): RedirectResponse
    {
        $ramal = Ramal::create($request->validated());

        $request->session()->flash('ramal.title', $ramal->title);

        return redirect()->route('ramal.index   ');
    }

    public function delete($id){
        $ramal = Ramal::findOrFail($id);
        $ramal->delete();
        return view('ramal.list')->with('ramals',Ramal::all());
    }


    public function edit(Request $request, Ramal $ramal): View
    {
        return view('ramal.form', compact('ramal'));
    }

    public function update(RamalUpdateRequest $request, Ramal $ramal): RedirectResponse
    {
        $ramal->update($request->validated());

        $request->session()->flash('ramal.id', $ramal->id);

        return redirect()->route('ramal.index');
    }

    public function show(Request $request, Ramal $ramal): View
    {
        $ramals = Ramal::all();
        return view('ramal.list')->with('ramals', $ramals);
    }

    public function search(Request $request)
    {

        if(!empty($request->valor)){
            $ramals = Ramal::where(
                $request->tipo,
                 'like' ,
                "%".$request->valor."%"
                )->get();
        } else {
            $ramals = Ramal::all();
        }

        return view('ramal.list')->with(['ramals'=> $ramals]);
    }

}
