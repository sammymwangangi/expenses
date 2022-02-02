<nav x-data="{ open: true }" class="shadow-lg bg-black">
    <div class="max-w-7xl px-2">
      <div class="relative flex items-center justify-between h-16">
        <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
          <button @click="open = !open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:bg-gray-700 focus:text-white transition duration-150 ease-in-out">
            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
              <path :class="{'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
              <path :class="{'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
        <div class="flex-1 flex items-center">
            <div class="flex-shrink-0">
                <h1 class="text-blue-600 font-semibold text-xl uppercase">Daily Expense Tracker</h1>
            </div>
        </div>
      </div>
    </div>
    <div :class="{'block': open, 'hidden': !open}" class="hidden sm:hidden">
      <div class="px-2 pt-2 pb-3">
          <div class="block relative mt-3 md:mt-0" x-data="{ isOpen: true }" @click.away="isOpen = false">
              <input
                  type="text"
                  class="w-full bg-gray-50 border-transparent text-sm rounded-md px-4 py-2 focus:outline-none focus:ring focus:ring-green-400" placeholder="Search for..."
                  x-ref="search"
              >
              <div class="z-50 absolute top-0">
                  <i class="fas fa-search text-gray-500 fill-current w-4 mt-2 ml-2"></i>
              </div>
          </div>
      </div>
    </div>
</nav>