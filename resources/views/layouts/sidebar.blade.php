<div x-data="{ open: true }" class="h-screen sticky top-0 w-1/5 px-4 py-6 bg-green-400 text-white">
    <div class="hidden sm:block font-semibold text-center space-y-4">

        <div class="max-w-sm mx-auto space-y-2 sm:py-4 sm:flex sm:items-center sm:space-y-0 sm:space-x-6">
            <img class="block mx-auto h-12 rounded-full sm:mx-0 sm:flex-shrink-0" src="{{ Auth::user()->profile_photo_url }}" alt="pp">
            {{-- <div class="w-12 h-12 rounded-full px-2 py-4 items-center justify-center text-white bg-blue-600 text-xs">50x50</div> --}}
            <div class="text-center space-y-2 sm:text-left">
                <div class="space-y-0.5">
                <p class="text-sm font-semibold">
                    {{Auth::user()->name}}
                </p>
                <div class="flex items-center text-center">
                    <div class="h-3 w-3 rounded-full bg-green-400 opacity-750"></div>
                    <div class="text-gray-500 text-xs">ONLINE</div>
                </div>
                </div>
            </div>
        </div>
        <hr class="text-gray-100 py-1">
        <x-item type="mainItem">
            <a href="{{route('dashboard')}}" class="flex">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                <span class="px-2 py-1">Dashboard</span>
            </a>
        </x-item>

        <div x-data="{ open: false }">
            <a href="#" @click="open=true" class="group hover:bg-green-300 text-white text-sm hover:text-black px-2 py-2 flex rounded-lg">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path></svg>
                <span class="px-2 py-1">Expenses</span>
                <svg class="chevron-down w-6 h-6 right-4 absolute" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
            </a>
            <ul x-show.transition.ease-out.duration-100.transform.opacity-0.scale-95.transform.opacity-100.scale-100.transition.ease-in.duration-75.transform.opacity-100.scale-100.transform.opacity-0.scale-95="open"
            @click.away="open = false">
                <x-item type="mainItem">
                    <a href="{{route('expenses.index')}}" class="flex px-6">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                        <span class="px-2 py-1">List</span>
                    </a>
                </x-item>
                <x-item type="mainItem">
                    <a href="{{route('expenses.create')}}" class="flex px-6">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                        <span class="px-2 py-1">Add New</span>
                    </a>
                </x-item>
            </ul>
        </div>

        <div x-data="{ open: false }">
            <a href="#" @click="open=true" class="group hover:bg-green-300 text-white text-sm hover:text-black px-2 py-2 flex rounded-lg">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                <span class="px-2 py-1">Expense Report</span>
                <svg class="chevron-down w-6 h-6 right-4 absolute" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
            </a>
            <ul x-show.transition.ease-out.duration-100.transform.opacity-0.scale-95.transform.opacity-100.scale-100.transition.ease-in.duration-75.transform.opacity-100.scale-100.transform.opacity-0.scale-95="open"
            @click.away="open = false">
                <x-item type="mainItem">
                    <a href="{{route('report.index')}}" class="flex px-6">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                        <span class="px-2 py-1">List</span>
                    </a>
                </x-item>
                <x-item type="mainItem">
                    <a href="{{route('register')}}" class="flex px-6">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path></svg>
                        <span class="px-2 py-1">FIlter By</span>
                    </a>
                </x-item>
            </ul>
        </div>

        <div x-data="{ open: false }">
            <a href="#" @click="open=true" class="group hover:bg-green-300 text-white text-sm hover:text-black px-2 py-2 flex rounded-lg">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path></svg>
                <span class="px-2 py-1">Categories</span>
                <svg class="chevron-down w-6 h-6 right-4 absolute" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
            </a>
            <ul x-show.transition.ease-out.duration-100.transform.opacity-0.scale-95.transform.opacity-100.scale-100.transition.ease-in.duration-75.transform.opacity-100.scale-100.transform.opacity-0.scale-95="open"
            @click.away="open = false">
                <x-item type="mainItem">
                    <a href="{{route('categories.index')}}" class="flex px-6">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                        <span class="px-2 py-1">List</span>
                    </a>
                </x-item>
                <x-item type="mainItem">
                    <a href="{{route('categories.create')}}" class="flex px-6">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                        <span class="px-2 py-1">Add New</span>
                    </a>
                </x-item>
            </ul>
        </div>

        <div x-data="{ open: false }">
            <a href="#" @click="open=true" class="group hover:bg-green-300 text-white text-sm hover:text-black px-2 py-2 flex rounded-lg">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path></svg>
                <span class="px-2 py-1">Budgets</span>
                <svg class="chevron-down w-6 h-6 right-4 absolute" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
            </a>
            <ul x-show.transition.ease-out.duration-100.transform.opacity-0.scale-95.transform.opacity-100.scale-100.transition.ease-in.duration-75.transform.opacity-100.scale-100.transform.opacity-0.scale-95="open"
            @click.away="open = false">
                <x-item type="mainItem">
                    <a href="{{route('budgets.index')}}" class="flex px-6">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                        <span class="px-2 py-1">List</span>
                    </a>
                </x-item>
                <x-item type="mainItem">
                    <a href="{{route('budgets.create')}}" class="flex px-6">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                        <span class="px-2 py-1">Add New</span>
                    </a>
                </x-item>
            </ul>
        </div>

        <x-item type="mainItem">
            <a href="{{route('profile')}}" class="flex">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                <span class="px-2 py-1">Profile</span>
            </a>
        </x-item>

        <x-item type="mainItem">
            <a href="{{route('profile')}}" class="flex">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                <span class="px-2 py-1">Change Password</span>
            </a>
        </x-item>
        <form method="POST" action="{{ route('logout') }}">
            <x-item type="mainItem">
                @csrf

                <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                this.closest('form').submit();" class="flex">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                    <span class="px-2 py-1">{{ __('Log Out') }}</span>
                </a>
            </x-item>
        </form>
    </div>
    <div :class="{'block': open, 'hidden': !open}" class="hidden md:hidden">
        <div class="py-3 overflow-y-auto -mt-2">
            <x-item type="resItem">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="fill-current" width="24" height="24">
                    <path class="heroicon-ui" d="M13 20v-5h-2v5a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-7.59l-.3.3a1 1 0 1 1-1.4-1.42l9-9a1 1 0 0 1 1.4 0l9 9a1 1 0 0 1-1.4 1.42l-.3-.3V20a2 2 0 0 1-2 2h-3a2 2 0 0 1-2-2zm5 0v-9.59l-6-6-6 6V20h3v-5c0-1.1.9-2 2-2h2a2 2 0 0 1 2 2v5h3z"/></svg>
            </x-item>
            <x-item type="resItem">
                <a href="{{route('login')}}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="fill-current" width="24" height="24" viewBox="0 0 24 24"><g fill=""><path d="M20.5 15.1a1 1 0 0 0-1.34.45A8 8 0 1 1 12 4a7.93 7.93 0 0 1 7.16 4.45 1 1 0 0 0 1.8-.9 10 10 0 1 0 0 8.9 1 1 0 0 0-.46-1.35zM21 11h-9.59l2.3-2.29a1 1 0 1 0-1.42-1.42l-4 4a1 1 0 0 0-.21.33 1 1 0 0 0 0 .76 1 1 0 0 0 .21.33l4 4a1 1 0 0 0 1.42 0 1 1 0 0 0 0-1.42L11.41 13H21a1 1 0 0 0 0-2z"></path></g></svg>
                </a>
            </x-item>
            <x-item type="resItem">
                <a href="{{route('register')}}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="fill-current" viewBox="0 0 24 24"><title>user-plus</title><g fill=""><path d="M21 10.5h-1v-1a1 1 0 0 0-2 0v1h-1a1 1 0 0 0 0 2h1v1a1 1 0 0 0 2 0v-1h1a1 1 0 0 0 0-2zm-7.7 1.72A4.92 4.92 0 0 0 15 8.5a5 5 0 0 0-10 0 4.92 4.92 0 0 0 1.7 3.72A8 8 0 0 0 2 19.5a1 1 0 0 0 2 0 6 6 0 0 1 12 0 1 1 0 0 0 2 0 8 8 0 0 0-4.7-7.28zM10 11.5a3 3 0 1 1 3-3 3 3 0 0 1-3 3z"></path></g></svg>

                </a>
            </x-item>
            <x-item type="resItem">
                <a href="{{url('profile')}}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="fill-current" width="24" height="24" viewBox="0 0 24 24"><title>user</title><g fill=""><path d="M15.71 12.71a6 6 0 1 0-7.42 0 10 10 0 0 0-6.22 8.18 1 1 0 0 0 2 .22 8 8 0 0 1 15.9 0 1 1 0 0 0 1 .89h.11a1 1 0 0 0 .88-1.1 10 10 0 0 0-6.25-8.19zM12 12a4 4 0 1 1 4-4 4 4 0 0 1-4 4z"></path></g></svg>

                </a>
            </x-item>
            <x-item type="resItem">
                <a href="{{url('github')}}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="fill-current" width="24" height="24" viewBox="0 0 24 24"><title>user</title><g fill=""><path d="M15.71 12.71a6 6 0 1 0-7.42 0 10 10 0 0 0-6.22 8.18 1 1 0 0 0 2 .22 8 8 0 0 1 15.9 0 1 1 0 0 0 1 .89h.11a1 1 0 0 0 .88-1.1 10 10 0 0 0-6.25-8.19zM12 12a4 4 0 1 1 4-4 4 4 0 0 1-4 4z"></path></g></svg>

                </a>
            </x-item>
            <x-item type="resItem">
                <a href="{{url('github')}}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="fill-current" width="24" height="24" viewBox="0 0 24 24"><title>user</title><g fill=""><path d="M15.71 12.71a6 6 0 1 0-7.42 0 10 10 0 0 0-6.22 8.18 1 1 0 0 0 2 .22 8 8 0 0 1 15.9 0 1 1 0 0 0 1 .89h.11a1 1 0 0 0 .88-1.1 10 10 0 0 0-6.25-8.19zM12 12a4 4 0 1 1 4-4 4 4 0 0 1-4 4z"></path></g></svg>

                </a>
            </x-item>
        </div>
    </div>
</div>
