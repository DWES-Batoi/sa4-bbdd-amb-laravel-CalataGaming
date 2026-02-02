@props(['partit'])

<div class="partit border rounded-lg shadow-md p-6 bg-white dark:bg-gray-800 dark:text-gray-100 mb-4 hover:shadow-lg transition-shadow">
    <div class="flex justify-between items-center text-center">
        <!-- Local -->
        <div class="flex-1">
            <h3 class="font-bold text-lg text-gray-800 dark:text-gray-200">{{ $partit->local->nom ?? 'Local' }}</h3>
        </div>

        <!-- VS / Resultado -->
        <div class="flex-0 px-4">
            <div class="text-2xl font-black text-blue-600 dark:text-blue-400">
                @if($partit->gols)
                    {{ $partit->gols }}
                @else
                    VS
                @endif
            </div>
            <div class="text-xs text-gray-500 mt-1">
                Jornada {{ $partit->jornada }}
            </div>
        </div>

        <!-- Visitante -->
        <div class="flex-1">
            <h3 class="font-bold text-lg text-gray-800 dark:text-gray-200">{{ $partit->visitant->nom ?? 'Visitante' }}</h3>
        </div>
    </div>

    <div class="mt-4 border-t pt-2 text-center text-sm text-gray-600 dark:text-gray-400">
        <p>📅 {{ \Carbon\Carbon::parse($partit->data)->format('d/m/Y H:i') }}</p>
        @if($partit->estadi)
            <p>🏟 {{ $partit->estadi->nom }}</p>
        @endif
    </div>
</div>
