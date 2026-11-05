@props(['title' => null, 'note' => null])
@php
    $codigo = isset($code) ? trim((string) $code) : preg_replace('/\n\s*\n/', "\n", trim((string) $slot));
@endphp
<div class="mr-example" @if ($title) id="{{ \Illuminate\Support\Str::slug($title) }}" @endif>
    <div class="mr-example-head">
        @if ($title)<h6 class="mr-example-title">{{ $title }}</h6>@endif
        <div class="mr-example-tabs" role="tablist">
            <button type="button" class="is-active" data-mr-tab="preview" role="tab">Vista previa</button>
            <button type="button" data-mr-tab="code" role="tab">Código</button>
        </div>
    </div>
    @if ($note)<p class="text-muted small mb-2">{{ $note }}</p>@endif
    <div class="mr-example-preview" data-mr-pane="preview">{{ $slot }}</div>
    <div class="mr-example-codebox" data-mr-pane="code" hidden>
        <button type="button" class="mr-copy" data-mr-copy><i class="ri-file-copy-line"></i><span>Copiar</span></button>
        <pre><code>{{ $codigo }}</code></pre>
    </div>
</div>
