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
                    <span> / Categories</span>
                </div>
                {{-- HEADING --}}
                <div class="flex justify-between items-center px-6 py-4">

                    <h1 class="text-3xl text-gray-500 font-normal">Categories</h1>
                    <a href="{{route('categories.create')}}" class="flex items-center space-x-2 px-4 py-2 bg-blue-500 rounded-lg text-white">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                        <span>New</span>
                    </a>
                </div>

                {{-- CONTENT --}}

                    <section class="py-8">
                        <div class="container px-4 mx-auto">
                            <div class="pt-4 bg-white shadow rounded">
                            <div class="flex px-6 pb-4 border-b">
                                <h3 class="text-xl font-bold">Recent Categories</h3>
                            </div>
                            <div class="p-4">
                                <table class="table-auto w-full">
                                <thead>
                                    <tr class="text-xs text-gray-500 text-left">
                                        <th class="pb-3 font-medium">S.No.</th>
                                        <th class="pb-3 font-medium">Category Name </th>
                                        <th class="pb-3 font-medium">Category Slug</th>
                                        <th class="pb-3 font-medium">Parent Category</th>
                                        <th scope="col" class="pb-3 font-medium">Action </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(isset($categories))
                                    <?php $_SESSION['i'] = 0; ?>
                                    @foreach ($categories as $category)
                                    <?php $_SESSION['i']=$_SESSION['i']+1; ?>
                                    <tr class="text-xs even:tw-bg-gray-50">
                                        <?php $dash=''; ?>
                                        <td class="font-medium">{{$_SESSION['i']}}</td>
                                        <td class="font-medium">{{$category->name}}</td>
                                        <td class="font-medium">{{$category->slug}}</td>
                                        <td class="font-medium">
                                            @if(isset($category->parent_id))
                                            {{$category->subcategory->name}}
                                            @else
                                                None
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{route('categories.edit', $category['id'])}}" class="inline-block py-1 px-2 text-white bg-blue-500 rounded-full">Edit</a>
                                        </td>
                                        <td>
                                            <a href="{{route('categories.show', $category['id'])}}" class="inline-block py-1 px-2 text-white bg-green-500 rounded-full">Show</a>
                                        </td>
                                        <td>
                                            <form action="{{route('categories.destroy', $category['id'])}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="inline-block py-1 px-2 text-white bg-red-500 rounded-full" type="submit">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                    <?php unset($_SESSION['i']); ?>
                                    @endif
                                </tbody>
                                </table>
                                <div class="text-center mt-5">
                                <a class="inline-flex items-center text-xs text-indigo-500 hover:text-blue-600 font-medium" href="#">
                                    <span class="inline-block mr-2">
                                    <svg class="text-indigo-400 h-3 w-3" viewbox="0 0 12 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8.66667 12.3333H3.33333C2.8029 12.3333 2.29419 12.1226 1.91912 11.7476C1.54405 11.3725 1.33333 10.8638 1.33333 10.3333V3.66668C1.33333 3.48987 1.2631 3.3203 1.13807 3.19527C1.01305 3.07025 0.843478 3.00001 0.666667 3.00001C0.489856 3.00001 0.320286 3.07025 0.195262 3.19527C0.0702379 3.3203 0 3.48987 0 3.66668V10.3333C0 11.2174 0.351189 12.0652 0.976311 12.6904C1.60143 13.3155 2.44928 13.6667 3.33333 13.6667H8.66667C8.84348 13.6667 9.01305 13.5964 9.13807 13.4714C9.2631 13.3464 9.33333 13.1768 9.33333 13C9.33333 12.8232 9.2631 12.6536 9.13807 12.5286C9.01305 12.4036 8.84348 12.3333 8.66667 12.3333ZM4.66667 7.66668C4.66667 7.84349 4.7369 8.01306 4.86193 8.13808C4.98695 8.26311 5.15652 8.33334 5.33333 8.33334H8.66667C8.84348 8.33334 9.01305 8.26311 9.13807 8.13808C9.2631 8.01306 9.33333 7.84349 9.33333 7.66668C9.33333 7.48987 9.2631 7.3203 9.13807 7.19527C9.01305 7.07025 8.84348 7.00001 8.66667 7.00001H5.33333C5.15652 7.00001 4.98695 7.07025 4.86193 7.19527C4.7369 7.3203 4.66667 7.48987 4.66667 7.66668ZM12 4.96001C11.9931 4.89877 11.9796 4.83843 11.96 4.78001V4.72001C11.9279 4.65146 11.8852 4.58845 11.8333 4.53334V4.53334L7.83333 0.533343C7.77822 0.481488 7.71521 0.438731 7.64667 0.406677C7.62677 0.40385 7.60657 0.40385 7.58667 0.406677C7.51894 0.367838 7.44415 0.342906 7.36667 0.333344H4.66667C4.13623 0.333344 3.62753 0.544057 3.25245 0.91913C2.87738 1.2942 2.66667 1.80291 2.66667 2.33334V9.00001C2.66667 9.53044 2.87738 10.0392 3.25245 10.4142C3.62753 10.7893 4.13623 11 4.66667 11H10C10.5304 11 11.0391 10.7893 11.4142 10.4142C11.7893 10.0392 12 9.53044 12 9.00001V5.00001C12 5.00001 12 5.00001 12 4.96001ZM8 2.60668L9.72667 4.33334H8.66667C8.48986 4.33334 8.32029 4.26311 8.19526 4.13808C8.07024 4.01306 8 3.84349 8 3.66668V2.60668ZM10.6667 9.00001C10.6667 9.17682 10.5964 9.34639 10.4714 9.47141C10.3464 9.59644 10.1768 9.66668 10 9.66668H4.66667C4.48986 9.66668 4.32029 9.59644 4.19526 9.47141C4.07024 9.34639 4 9.17682 4 9.00001V2.33334C4 2.15653 4.07024 1.98696 4.19526 1.86194C4.32029 1.73691 4.48986 1.66668 4.66667 1.66668H6.66667V3.66668C6.66847 3.89411 6.70905 4.11956 6.78667 4.33334H5.33333C5.15652 4.33334 4.98695 4.40358 4.86193 4.52861C4.7369 4.65363 4.66667 4.8232 4.66667 5.00001C4.66667 5.17682 4.7369 5.34639 4.86193 5.47141C4.98695 5.59644 5.15652 5.66668 5.33333 5.66668H10.6667V9.00001Z" fill="currentColor"></path>
                                    </svg>
                                    </span>
                                    <span>Load more categories</span>
                                </a>
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
