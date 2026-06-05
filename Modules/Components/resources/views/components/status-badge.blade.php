@props(['status'])

@php
    $classes = $status->badgeClasses();
@endphp

<span {{ $attributes->merge(['class' => "inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-medium {$classes['bg']} {$classes['text']}"]) }}>
    {{ $status->value }}
</span>
