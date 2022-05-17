     <form method="post" action="{{ $action }} ">
        @csrf
         @isset($update)
             @method('PUT')
         @endisset

         @if ($errors->any())
             <div class="alert alert-danger">
                 <ul>
                     @foreach ($errors->all() as $error)
                         <li>{{ $error }}</li>
                     @endforeach
                 </ul>
             </div>
         @endif
        <div class="mb-3">
            <label class="form-label">Nome da Série: </label>
            <input class="form-control" type="text" name="nome"
                   value="@isset($nome) {{ $nome }}@endisset"
            />

        </div>
        <button type="submit" class="btn btn-primary">{{ $botao }}</button>
    </form>
