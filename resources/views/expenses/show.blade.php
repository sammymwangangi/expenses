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
                    <a href="{{ route('expenses.index') }}"> / Expenses</a>
                    <span> / Show</span>
                </div>
                {{-- HEADING --}}
                <div class="flex justify-between items-center px-6 py-4">

                    <h1 class="text-3xl text-gray-500 font-normal">{{$expense->category->name}}</h1>
                    <a href="{{route('expenses.create')}}" class="flex items-center space-x-2 px-4 py-2 bg-blue-500 rounded-lg text-white">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                        <span>New</span>
                    </a>
                </div>

                {{-- CONTENT --}}

                <section class="py-8">
                    <div class="container px-4 mx-auto">
                        <div class="mt-5 md:mt-0 md:col-span-2">
                            <form action="#" method="POST">
                                @csrf
                                {{-- @method('PUT') --}}
                                <div class="shadow overflow-hidden sm:rounded-md">
                                <div class="px-4 py-5 bg-white sm:p-6">
                                    <div class="grid grid-cols-6 gap-6">

                                        <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                            <label for="item" class="block text-sm font-medium text-gray-700">Category</label>
                                            <select type="text" name="parent_id" class="form-control">
                                                <option value="">None</option>
                                                @if($categories)
                                                    @foreach($categories as $category)
                                                        <?php $dash=''; ?>
                                                        <option value="{{$expense->category->id}}">{{$expense->category->name}}</option>
                                                        @if(count($category->subcategory))
                                                            @include('categories.subCategoryList-option',['subcategories' => $category->subcategory])
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>

                                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                            <label for="cost" class="block text-sm font-medium text-gray-700">Expense Cost</label>
                                            <input type="number" name="cost" id="cost" autocomplete="cost" value="{{$expense->cost}}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>

                                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                            <label for="date" class="block text-sm font-medium text-gray-700">Expense Date</label>
                                            <input type="date" name="date" id="date" autocomplete="date" value="{{$expense->date}}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>

                {{-- END CONTENT --}}

            </div>
        </div>
    </div>
    {{-- END BODY SECTION --}}

@endsection