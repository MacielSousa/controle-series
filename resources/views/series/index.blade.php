<x-layout title="Series" :mensagem-sucesso="$mensagemSucesso">
    <a class="btn btn-dark mb-2" href={{route('series.create')}}>Adicionar</a>

    <ul class="list-group">
        @foreach ($series as $serie)
            <li class="list-group-item d-flex justify-content-between align-content-center">
               <a href="{{ route('seasons.index', $serie->id) }}">
                   {{$serie -> nome}}
               </a>

                <div class="d-flex justify-content-between align-content-center">
                    <a class="btn btn-primary mx-2" href={{route('series.edit', $serie->id)}}>Editar</a>

                    <form action="{{ route('series.destroy', $serie->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">
                            Excluir
                        </button>
                    </form>
                </div>

            </li>
        @endforeach
    </ul>
    <script>
        const series = {{Js::from($series)}};
    </script>

</x-layout>
