<header class="fixed top-0 z-50 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-start rtl:justify-end">
                <button @click="sidebarOpen = !sidebarOpen" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                    <span class="sr-only">Open sidebar</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
                    </svg>
                </button>
                <a href="{{ route('admin.dashboard') }}" class="flex ms-2 md:me-24">
                    <img src="https://flowbite.com/docs/images/logo.svg" class="h-8 me-3" alt="FlowBite Logo" />
                    <span class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap dark:text-white">News Talenthub</span>
                </a>
            </div>
            <div class="flex items-center">
                <div class="relative flex items-center ms-3" x-data="{ open: false }">
                    <div>
                        <button @click="open = !open" type="button" class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" aria-expanded="false">
                            <span class="sr-only">Open user menu</span>
                            <img class="w-8 h-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo ? Storage::url(Auth::user()->profile_photo) : 'https://via.placeholder.com/40' }}" alt="user photo">
                        </button>
                    </div>
                    <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50 dark:bg-gray-700 dark:divide-gray-600" style="display: none; top: calc(100% + 0.5rem);">
                        <div class="px-4 py-3 border-b border-gray-200 dark:border-gray-600">
                            <p class="text-sm font-semibold text-gray-900 dark:text-white">{{ Auth::user()->name }}</p>
                        </div>
                        <ul class="py-1">
                            <form method="POST" action="{{ route('logout') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                @csrf
                                <button type="submit" class="flex items-center w-full text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                    <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1m0-10V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1" />
                                    </svg>
                                    <span class="ml-3">Logout</span>
                                </button>
                            </form>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
