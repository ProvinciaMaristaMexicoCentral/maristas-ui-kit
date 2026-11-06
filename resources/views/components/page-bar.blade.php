{{-- Título de la pantalla con sus migas de pan. $items: [['name' => 'Inicio', 'href' => '/dashboard'], ['name' => 'Detalle']] (el último es la página actual) --}}
@props(['title', 'items' => []])
<div {{ $attributes->merge(['class' => 'mr-pagebar']) }}>
    <h1 class="mr-pagebar-title">{{ $title }}</h1>
    @if (count($items))
        <nav aria-label="Migas de pan">
            <ol class="mr-breadcrumb">
                @foreach ($items as $item)
                    @if ($loop->last)
                        <li aria-current="page">{{ $item['name'] }}</li>
                    @else
                        <li><a href="{{ $item['href'] ?? '#' }}">{{ $item['name'] }}</a></li>
                    @endif
                @endforeach
            </ol>
        </nav>
    @endif
</div>
