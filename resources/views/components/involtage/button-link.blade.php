@props(['type' => 'default', 'iconOnly' => false, 'href' => '#'])

@php
    $colors = [
        'add' => 'bg-green-500 hover:bg-green-600 text-white',
        'edit' => 'bg-blue-500 hover:bg-blue-600 text-white',
        'delete' => 'bg-red-500 hover:bg-red-600 text-white',
        'default' => 'bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:ring-indigo-500 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150',
    ];

    $icons = [
        'add' =>
            '<svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" /></svg>',
        'edit' =>
            '<svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232a2.828 2.828 0 114 4L7 21H3v-4l12.232-12.232z" /></svg>',
        'delete' =>
            '<svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3m5 0H6" /></svg>',
        'default' => '',
    ];
@endphp

<a href="{{ $href }}"
    class="inline-flex items-center justify-center {{ $iconOnly ? 'w-8 h-8 rounded-full' : 'px-4 py-2 rounded-md' }} focus:outline-none focus:ring-2 focus:ring-offset-2 {{ $colors[$type] }}">
    {!! $icons[$type] !!}
    @if (!$iconOnly)
        <span class="ml-2">{{ $slot }}</span>
    @endif
</a>
