<x-layout title="Series">
    <a class="btn btn-dark mb-2" href={{route('series.create')}}>Adicionar</a>
    @isset($mensagemSucesso)
    <div class="alert alert-success">
        {{$mensagemSucesso}}
    </div>
    @endisset
    <ul class="list-group">
        @foreach ($series as $serie)
            <li class="list-group-item d-flex justify-content-between align-content-center">
                {{$serie -> nome}}

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
