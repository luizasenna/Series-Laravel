<x-layout title="Editar Série">
    @dd($serie)
    <x-series.form :nome="$serie->nome" botao="Atualizar" :action="route('series.update', $serie->id)" :update="true"/>
</x-layout>
