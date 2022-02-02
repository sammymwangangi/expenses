@props([
    'type' => 'mainItem',
    'colors' => [
        'mainItem' => 'hover:bg-green-300 text-sm cursor-pointer px-2',
        'resItem' => 'hover:bg-green-300 mb-2 items-center justify-center cursor-pointer',
    ]
])

<div {{ $attributes->merge(['class' => "{$colors[$type]} dark:text-gray-200 hover:text-black flex rounded-lg my-2 py-2"]) }}>
    {{ $slot }}
</div>