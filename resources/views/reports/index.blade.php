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
                <span> / Reports</span>
            </div>
            {{-- HEADING --}}
            <div class="flex justify-between items-center px-6 py-4">

                <h1 class="text-3xl text-gray-500 font-normal">Reports</h1>
            </div>
            {{-- CONTENT --}}

            <section class="py-8">
                <div class="container px-4 mx-auto">
                    {{-- <livewire:datatable model="App\Models\Expense" name="all-my-users" exportable /> --}}
                    <livewire:datatable
                        model="App\Models\Expense"
                        with="category"
                        sort="date|asc"
                        include="id, date, category.name|Category, cost"
                        searchable="category.name"
                        dates="date"
                        hideable="select"
                        exportable
                    />
                </div>
            </section>

            {{-- END CONTENT --}}

        </div>
    </div>
</div>
{{-- END BODY SECTION --}}

@endsection