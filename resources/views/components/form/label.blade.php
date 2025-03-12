@aware(['error'])

@props(['for', 'value'])

<span for="{{ $for ?? '' }}"
    {{ $attributes->merge([
        'class' => 'text-gray-500 text-sm font-semibold tracking-widest',
        'text-red-500' => $error, //condição, caso true, mostra text-red-500
    ]) }}>{{ $value }}
</span>
