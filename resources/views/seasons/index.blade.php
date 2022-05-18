<x-layout title="Temporadas de {!! $series->nome !!}" :mensagem-sucesso="$mensagemSucesso">


    <ul class="list-group">
        @foreach($seasons as $season)
            <li class="list-group-item d-flex justify-content-between align-content-center">
                    <a href="{{ route('episodes.index', $season->id) }}">
                        {{ $season->number }}
                    </a>

                <span class="badge bg-secondary">
                    {{ $season->episodes->count() }}
                </span>
            </li>
        @endforeach
    </ul>
</x-layout>
