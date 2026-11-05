<nav class="mr-docnav">
    @foreach (\Maristas\UiKit\Docs\Catalogo::grupos() as $grupo => $items)
        <div class="mr-docnav-group">
            <span class="mr-caption">{{ $grupo }}</span>
            @foreach ($items as $slug => $datos)
                <a href="{{ route('maristas-ui.docs', $slug === 'introduccion' ? null : $slug) }}" @class(['is-active' => ($pagina['slug'] ?? 'introduccion') === $slug])>{{ $datos['titulo'] }}</a>
            @endforeach
        </div>
    @endforeach
</nav>
