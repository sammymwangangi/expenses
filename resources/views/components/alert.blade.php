@if ($expenses > $budgets)
    <div class="p-6 mb-4 bg-red-50 border-l-4 border-red-500 rounded-r-lg">
        Your <span class="font-bold">Expenses</span> have exceeded your <a href="{{route('budgets.index')}}" class="underline decoration-indigo-500 decoration-wavy">Budget</a>!
    </div>
@endif