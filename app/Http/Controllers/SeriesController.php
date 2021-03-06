<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Autenticador;
use App\Http\Requests\SeriesFormRequest;
use App\Mail\SeriesCreated;
use App\Models\Serie;
use App\Models\User;
use App\Repositories\EloquentSeriesRepository;
use App\Repositories\SeriesRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Validator;

class SeriesController extends Controller
{
    public function __construct(private SeriesRepository $repository)
    {
        $this->middleware(Autenticador::class)->except('index');
    }

    public function index(Request $request)
    {
        $series = Serie::all();
        $mensagemSucesso = session('mensagem.sucesso');
        return view('series.index')->with('series', $series)
            ->with('mensagemSucesso', $mensagemSucesso);
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(SeriesFormRequest $request, EloquentSeriesRepository $repository)
    {

        $coverPath = $request->file('cover')->store('series_cover', 'public');
        $request->coverPath = $coverPath;
        $serie = $this->repository->add($request);

         \App\Events\SeriesCreated::dispatch(
            $serie->nome,
            $serie->id,
            $request->seasonsQtty,
            $request->episodesPerSeason,
        );

        return to_route('series.index')->with('mensagem.sucesso' , "Série '{$serie->nome}' adicionada com sucesso");

    }

    public function destroy(Serie $series){
        //$serie = Serie::find($request->series);
        //Serie::destroy($request->series);
        $series->delete();
       // $request->session()->flash('mensagem.sucesso',"Serie '{$series->nome}' removida com sucesso");

        return to_route('series.index')->with('mensagem.sucesso',"Serie '{$series->nome}' removida com sucesso");

    }

    public function edit(Serie $series){

        return view('series.edit')->with('serie', $series);
    }

    public function update(SeriesFormRequest $series, Request $request)
    {
        $series->fill($request->all());
        $series->save();
        return to_route('series.index')->with('mensagem.sucesso',"Serie '{$series->nome}' atualizada com sucesso");

    }

}
