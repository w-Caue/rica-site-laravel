@aware(['error'])

@props(['value', 'name', 'for', 'title'])


<textarea rows="4"
    {{ $attributes->class([
        'block p-2 text-xs uppercase font-semibold tracking-widest w-full focus:border-blue-400 rounded-md border border-gray-300',
        'border-red-500' => $error,
    ]) }}
    @isset($name) name="{{ $name }}" @endif
        type="text"
        @isset($value) value="{{ $value }}" @endif
    {{ $attributes }}> 
</textarea>