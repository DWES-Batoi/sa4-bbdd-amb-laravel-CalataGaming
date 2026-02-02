@props(['jugadora'])

<div class="jugadora border rounded-lg shadow-md p-4 bg-white dark:bg-gray-800 dark:text-gray-100 flex flex-col items-center">
    @if($jugadora->foto)
        <img src="{{ asset($jugadora->foto) }}" alt="{{ $jugadora->nom }}" class="w-24 h-24 rounded-full object-cover mb-4">
    @else
        <div class="w-24 h-24 rounded-full bg-gray-300 dark:bg-gray-700 flex items-center justify-center mb-4">
            <span class="text-4xl">👤</span>
        </div>
    @endif

    <h2 class="text-xl font-bold text-blue-800 dark:text-blue-400">{{ $jugadora->nom }}</h2>
    <p class="text-gray-600 dark:text-gray-300 font-semibold">#{{ $jugadora->dorsal }}</p>
    
    @if($jugadora->equip)
        <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
            <strong>Equip:</strong> {{ $jugadora->equip->nom }}
        </p>
    @endif

    @if($jugadora->posicio)
        <span class="mt-2 px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-xs">
            {{ $jugadora->posicio }}
        </span>
    @endif
</div>
