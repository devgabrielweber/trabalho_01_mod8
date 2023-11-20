<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServicoStoreRequest;
use App\Http\Requests\ServicoUpdateRequest;
use App\Models\Servico;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ServicoController extends Controller
{
    public function index(Request $request): View
    {
        $servicos = Servico::all();

        return view('servico.list', compact('servicos'));
    }

    public function create(Request $request): View
    {
        return view('servico.form');
    }

    public function store(ServicoStoreRequest $request): RedirectResponse
    {
        $servico = Servico::create($request->validated());

        $request->session()->flash('servico.id', $servico->id);

        return redirect()->route('servico.index');
    }

    public function show(Request $request, Servico $servico): View
    {
        $servicos = Servico::all();
        return view('servico.list')->with('servicos', $servicos);
    }

    public function edit(Request $request, Servico $servico): View
    {
        return view('servico.form', compact('servico'));
    }

    public function update(ServicoUpdateRequest $request, Servico $servico): RedirectResponse
    {
        $servico->update($request->validated());

        $request->session()->flash('servico.id', $servico->id);

        return redirect()->route('servico.index');
    }

    public function delete($id){
        $servico = Servico::findOrFail($id);
        $servico->delete();
        return view('servico.list')->with('servicos',Servico::all());
    }

    public function search(Request $request)
    {

        if(!empty($request->valor)){
            $servicos = Servico::where(
                $request->tipo,
                 'like' ,
                "%".$request->valor."%"
                )->get();
        } else {
            $servicos = Servico::all();
        }

        return view('servico.list')->with(['servicos'=> $servicos]);
    }
}