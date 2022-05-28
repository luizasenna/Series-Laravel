<x-layout title="Temporadas de {!! $series->nome !!}" >
<div class="text-center mb-3">
    <img src="{{ asset('storage/' . $series->cover) }}"
         alt="Capa da Serie"
         class="img-fluid"
        style="height: 250px;"
    />
</div>
    <ul class="list-group">
        @foreach($seasons as $season)
            <li class="list-group-item d-flex justify-content-between align-content-center">
                    <a href="{{ route('episodes.index', $season->id) }}">
                        {{ $season->number }}
                    </a>

                <span class="badge bg-secondary">
                   {{ $season->numberOfWatchedEpisodes() }} / {{ $season->episodes->count() }}
                </span>
            </li>
        @endforeach
    </ul>
</x-layout>
