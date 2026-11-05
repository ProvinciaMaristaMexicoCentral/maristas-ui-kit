@extends('maristas::docs.layout')
@section('title', $pagina['titulo'])

@section('content')
    @if ($pagina['slug'] === 'introduccion')
        @include('maristas::docs.pages.introduccion')
    @else
        <div class="mr-pagehead">
            <nav class="mr-crumbs" aria-label="Ruta"><span>{{ $pagina['grupo'] }}</span><i class="ri-arrow-right-s-line"></i><span>{{ $pagina['titulo'] }}</span></nav>
            <h1 class="mr-pagetitle">{{ $pagina['titulo'] }}</h1>
            <p class="mr-pagelead">{!! $pagina['descripcion'] !!}</p>
        </div>

        @include('maristas::docs.pages.'.$pagina['slug'])

        <nav class="mr-pager" aria-label="Páginas vecinas">
            @if ($anterior)
                <a class="mr-pager-link" href="{{ route('maristas-ui.docs', $anterior['slug'] === 'introduccion' ? null : $anterior['slug']) }}"><span class="mr-caption">Anterior</span><strong><i class="ri-arrow-left-s-line"></i>{{ $anterior['titulo'] }}</strong></a>
            @else <span></span> @endif
            @if ($siguiente)
                <a class="mr-pager-link is-next" href="{{ route('maristas-ui.docs', $siguiente['slug']) }}"><span class="mr-caption">Siguiente</span><strong>{{ $siguiente['titulo'] }}<i class="ri-arrow-right-s-line"></i></strong></a>
            @endif
        </nav>
    @endif
@endsection
