<x-layout title="Séries" :mensagem-sucesso="$mensagemSucesso">

    <a href="{{ route('series.create') }}" class="btn btn-dark mb-3" >Adicionar</a>
    <ul class="list-group">
        @foreach($series as $serie)
            <li class="list-group-item d-flex justify-content-between align-content-center">
                <a href="{{ route('seasons.index', $serie->id) }}">
                    {{ $serie->nome }}
                </a>

                <span class="d-flex">
                    <a class="btn btn-dark btn-sm" href="{{ route('series.edit', $serie->id) }}">
                        Editar
                    </a>
                    <form class="ms-1" action="{{ route('series.destroy', $serie->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">
                            X
                        </button>

                    </form>
                </span>
            </li>
        @endforeach
    </ul>
</x-layout>
