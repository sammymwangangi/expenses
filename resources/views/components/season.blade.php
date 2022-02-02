<div class="flex flex-shrink-0 flex-col space-y-4 px-6 py-2 bg-white shadow-lg text-center">
    <div>Today's Expense</div>
    <div class="w-12 h-12 mx-auto rounded-full py-4 items-center justify-center text-blue-400 border border-blue-500">
        <div>{{ $today_expenses}}</div>
    </div>
</div>
<div class="flex flex-shrink-0 flex-col space-y-4 px-6 py-2 bg-white shadow-lg justify-center">
    <div>Yesterday's Expense</div>
    <div class="w-12 h-12 mx-auto rounded-full py-4 items-center text-yellow-400 text-center border border-yellow-500">
        {{$yesterday_expenses}}</div>
</div>
<div class="flex flex-shrink-0 flex-col space-y-4 px-6 py-2 bg-white shadow-lg justify-center">
    <div>Last 7day's Expense</div>
    <div class="w-12 h-12 mx-auto rounded-full py-4 items-center text-green-400 text-center border border-green-500">{{$last_seven_days_expenses}}
    </div>
</div>
<div class="flex flex-shrink-0 flex-col space-y-4 px-6 py-2 bg-white shadow-lg justify-center">
    <div>Last 30day's Expenses</div>
    <div class="w-12 h-12 mx-auto rounded-full py-4 items-center text-red-400 text-center border border-red-500">{{$last_thirty_days_expenses}}
    </div>
</div>
<div class="flex flex-shrink-0 flex-col space-y-4 px-6 py-2 bg-white shadow-lg justify-center">
    <div>Current Year Expenses</div>
    <div class="text-red-500 text-center">{{$current_year_expenses}}</div>
</div>
<div class="flex flex-shrink-0 flex-col space-y-4 px-6 py-2 bg-white shadow-lg justify-center">
    <div>Total Expenses</div>
    <div class="text-red-500 text-center ">{{$total_expenses}}</div>
</div>