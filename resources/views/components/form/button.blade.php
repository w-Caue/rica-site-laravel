@aware(['type'])

@props(['value'])

<button type="{{ $type }}"
    {{ $attributes->merge([
        'class' => 'flex items-center justify-center gap-1 text-blue-500 
            uppercase font-bold bg-blue-200 rounded-lg p-2 transition-all hover:scale-95 
            focus:outline-blue-600',
    ]) }}>

    {{ $value }}
</button>


