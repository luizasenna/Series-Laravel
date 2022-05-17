<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Episode;
use App\Models\Season;
use App\Models\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;

class SeriesController extends Controller
{
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

    public function store(SeriesFormRequest $request)
    {

        $serie = Serie::create($request->all());
        $seasons = [];
        for ($i = 1; $i <= $request->seasonsQtty; $i++){
            $seasons[] = [
                'series_id' => $serie->id,
                'number' => $i,
            ];
        }
        Season::insert($seasons);
        $episodes = [];
        foreach($serie->seasons as $season) {
            for ($j = 1; $j <= $request->episodesPerSeason; $j++) {
                $episodes[] = [
                    'season_id' => $season->id,
                    'number' => $j,
                ];
            }
        }
        Episode::insert($episodes);

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
