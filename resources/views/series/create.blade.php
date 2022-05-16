<x-layout title="Adicionar Série">
    <form method="post" action=" {{route('series.store')}}">
        @csrf
        <div class="mb-3">
            <label class="form-label">Nome da Série: </label>
            <input class="form-control" type="text" name="nome" />

        </div>
        <button type="submit" class="btn btn-primary">Adicionar</button>
    </form>
</x-layout>
