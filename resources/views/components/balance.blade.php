<div class="flex-1">
    <div class="text-5xl font-extrabold">
        <span class="bg-clip-text text-transparent bg-gradient-to-r from-green-400 to-blue-500">
            WALLET
        </span>
    </div>
    <div class="text-5xl font-extrabold">
        <span class="bg-clip-text text-transparent bg-gradient-to-r from-green-400 to-blue-500">
            {{ $total_savings}}
        </span>
    </div>
</div>

<div class="flex-1 bg-gray-900 px-6 py-12 h-48 text-center items-center">
    <div class="text-5xl font-extrabold">
        <span class="bg-clip-text text-transparent bg-gradient-to-r from-red-400 to-yellow-500">
            BALANCE
        </span>
    </div>
    <div class="text-5xl font-extrabold">
        <span class="bg-clip-text text-transparent bg-gradient-to-r from-red-400 to-yellow-500">
            {{ $balance}}
            {{-- @if ($balance > 1)
                {{ $balance}}
            @else
                Your wallet is zero!
            @endif --}}
        </span>
    </div>
</div>
