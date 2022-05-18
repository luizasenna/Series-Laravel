<x-layout title="Episodios" :mensagem-sucesso="$mensagemSucesso" >

    <form method="post">
        @csrf
        <ul class="list-group">
            @foreach($episodes as $episode)
                <li class="list-group-item d-flex justify-content-between align-content-center">

                        {{ $episode->number }}

                   <input type="checkbox"
                          name="episodes[]"
                          value="{{ $episode->id }}"
                           @if ($episode->watched) checked @endif  >
                </li>
            @endforeach
        </ul>
        <button class="btn btn-primary mt-2" type="submit">Salvar</button>
    </form>
</x-layout>
