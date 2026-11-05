@props(['title' => null, 'note' => null])
<div class="mr-example">
    @if ($title)<h6 class="mr-example-title">{{ $title }}</h6>@endif
    @if ($note)<p class="text-muted small mb-2">{{ $note }}</p>@endif
    <div class="mr-example-preview">{{ $slot }}</div>
    <details class="mr-example-code">
        <summary>Ver código</summary>
        <pre><code>{{ isset($code) ? trim((string) $code) : preg_replace('/\n\s*\n/', "\n", trim((string) $slot)) }}</code></pre>
    </details>
</div>
