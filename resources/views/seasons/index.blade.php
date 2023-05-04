<x-layout title="Series">
    <ul class="list-group">
        @foreach ($seasons as $season)
            <li class="list-group-item d-flex justify-content-between align-content-center">
                <a href="{{ route('episodes.index', $season->id) }}">
                    Temporada {{$season -> number}}
                </a>

                <div class="d-flex justify-content-between align-content-center">
                    {{ $season->numberOfWatchedEpisodes() }} /{{ $season->episodes->count() }}
                </div>
            </li>
        @endforeach
    </ul>
    <script>
        const seasons = {{Js::from($seasons)}};
    </script>
</x-layout>
