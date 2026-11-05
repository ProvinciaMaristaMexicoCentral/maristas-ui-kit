@props(['do' => true])
<div {{ $attributes->merge(['class' => 'mr-rule '.($do ? 'mr-rule-do' : 'mr-rule-dont')]) }}>
    <strong>{{ $do ? 'Sí' : 'No' }}</strong>
    {{ $slot }}
</div>
