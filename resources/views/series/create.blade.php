<x-layout title="Adicionar Série">


   <x-series.form botao="Adicionar" :action="route('series.store')" :nome="old('nome')" />



</x-layout>
