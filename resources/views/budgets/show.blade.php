@extends('layouts.admin')
@section('content')
    {{-- BODY SECTION --}}
    <div class="">
        @include('layouts.navbar')
        {{-- SIDEBAR --}}
        <div class="flex">
            @include('layouts.sidebar')
            {{-- END SIDEBAR --}}
            <div class="flex-1 w-4/5 bg-gray-100">
                {{-- HEADING --}}
                <div class="flex w-full space-x-2 bg-gray-200 items-center px-6 py-2">
                    <a href="{{ route('dashboard') }}">

                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                            </path>
                        </svg>
                    </a>
                    <a href="{{ route('budgets.index') }}"> / Budgets</a>
                    <span> / Show</span>
                </div>
                {{-- HEADING --}}
                <div class="flex justify-between items-center px-6 py-4">

                    <h1 class="text-3xl text-gray-500 font-normal">{{$budget->category->name}}</h1>
                    <a href="{{route('budgets.create')}}" class="flex items-center space-x-2 px-4 py-2 bg-blue-500 rounded-lg text-white">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                        <span>New</span>
                    </a>
                </div>

                {{-- CONTENT --}}

                <section class="py-8">
                    <div class="container px-4 mx-auto">
                        <div class="mt-5 md:mt-0 md:col-span-2">
                            @if ($expenses > $amount)
                                <div class="p-6 mb-4 bg-red-50 border-l-4 border-red-500 rounded-r-lg">
                                    Your <span class="font-bold">Expenses</span> have exceeded your Budget!
                                </div>
                            @endif
                            <div class="flex gap-6">
                                <div class="flex-1 flex-col gap-2 px-6 py-8 rounded-lg bg-cyan-500 shadow-lg shadow-cyan-500/50 text-center items-center">
                                    <div class="text-xl text-yellow-400 font-semibold">Budgeted Amount</div>
                                    <div class="text-3xl text-white font-bold">KSH {{$amount}}</div>
                                </div>
                                <div class="flex-1 flex-col gap-2 px-6 py-8 rounded-lg bg-red-500 shadow-lg shadow-red-500/50 text-center items-center">
                                    <div class="text-xl text-white font-semibold">Expense Percentage</div>
                                    <div class="text-3xl text-white font-bold">{{number_format($percbudget,2)}}%</div>
                                </div>

                            </div>
                            
                        </div>
                    </div>
                </section>

                {{-- END CONTENT --}}

            </div>
        </div>
    </div>
    {{-- END BODY SECTION --}}

@endsection
