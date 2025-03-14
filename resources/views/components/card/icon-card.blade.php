@aware(['error'])

@props(['title', 'subtitle', 'color', 'url'])

<div {{ $attributes->merge(['class' => 'flex items-center p-4 bg-white rounded-lg shadow-lg cursor-pointer transition-all hover:scale-95']) }}>
    
    {{ $slot }}
    <div>
        @isset($title)
            <p class="mb-2 text-xs font-bold tracking-widest uppercase text-gray-600">
                {{ $title }}
            </p>
        @endisset
        @isset($subtitle)
            <p class="text-md text-center font-semibold text-gray-500">
                {{ $subtitle }}
            </p>
        @endisset
    </div>
</div>
