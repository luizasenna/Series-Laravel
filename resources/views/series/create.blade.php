<x-layout title="Adicionar Série">

    <form method="post" action="{{ route('series.store') }} " enctype="multipart/form-data">
        @csrf


        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row mb-3">
            <div class="col-8">
                <div class="mb-3">
                    <label class="form-label">Nome da Série: </label>
                    <input autofocus class="form-control" type="text" name="nome"
                    />
                </div>
            </div>
            <div class="col-2">
                <div class="mb-3">
                    <label class="form-label">Qtde de Temporadas: </label>
                    <input class="form-control" type="text" name="seasonsQtty"
                    />
                </div>
            </div>
            <div class="col-2">
                <div class="mb-3">
                    <label class="form-label">Epis por Temporada: </label>
                    <input class="form-control" type="text" name="episodesPerSeason"
                    />
                </div>
            </div>

        </div>
        <div class="row mb-3">
            <div class="col-12">
                <label class="form-label">Capa</label>
                <input type="file" id="cover"
                       name="cover" class="form-control"
                        accept="image/gif, image/jpeg, image/png"
                />
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Adicionar</button>
    </form>


</x-layout>
