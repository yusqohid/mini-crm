@props(['status'])

@php
    $color = match ($status) {
        'open' => 'blue',
        'in progress' => 'indigo',
        'blocked' => 'yellow',
        'cancelled' => 'red',
        'completed' => 'green',
        default => 'gray',
    };
@endphp

<span
    class="px-3 py-1 text-xs font-medium rounded-full
    bg-{{ $color }}-100 text-{{ $color }}-800
    dark:bg-{{ $color }}-900 dark:text-{{ $color }}-200">
    {{ ucwords($status) }}
</span>
