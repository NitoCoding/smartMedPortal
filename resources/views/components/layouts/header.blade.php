    <nav class="block bg-white border-b border-gray-200 px-4 py-2.5 dark:bg-gray-800 dark:border-gray-700 fixed left-0 right-0 top-0 z-50">
        <div class="flex flex-wrap items-center justify-between">
        <div class="flex items-center justify-start">
            <button
            data-drawer-target="default-sidebar"
            data-drawer-toggle="default-sidebar"
            aria-controls="default-sidebar"
            class="p-2 mr-2 text-gray-600 rounded-lg cursor-pointer md:hidden hover:text-gray-900 hover:bg-gray-100 focus:bg-gray-100 dark:focus:bg-gray-700 focus:ring-2 focus:ring-gray-100 dark:focus:ring-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
            >
            <svg
                aria-hidden="true"
                class="w-6 h-6"
                fill="currentColor"
                viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg"
            >
                <path
                fill-rule="evenodd"
                d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                clip-rule="evenodd"
                ></path>
            </svg>
            <svg
                aria-hidden="true"
                class="hidden w-6 h-6"
                fill="currentColor"
                viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg"
            >
                <path
                fill-rule="evenodd"
                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                clip-rule="evenodd"
                ></path>
            </svg>
            <span class="sr-only">Toggle sidebar</span>
            </button>
            <h1 class="flex items-center justify-between mr-4">
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">SmartMedPortal</span>
            </h1>
        </div>
        <div class="flex items-center lg:order-2">
            {{-- <button
            type="button"
            data-drawer-toggle="drawer-navigation"
            aria-controls="drawer-navigation"
            class="p-2 mr-1 text-gray-500 rounded-lg md:hidden hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-700 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
            >
            <span class="sr-only">Toggle search</span>
            <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path clip-rule="evenodd" fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"></path>
            </svg>
            </button> --}}
            <button
            type="button"
            class="flex mx-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
            id="user-menu-button"
            aria-expanded="false"
            data-dropdown-toggle="dropdown"
            >
            <span class="sr-only">Open user menu</span>
            <img
                class="w-8 h-8 rounded-full"
                src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/michael-gough.png"
                alt="user photo"
            />
            </button>
            <!-- Dropdown menu -->
            <div
            class="z-50 hidden w-56 my-4 text-base list-none bg-white divide-y divide-gray-100  shadow dark:bg-gray-700 dark:divide-gray-600 rounded-xl"
            id="dropdown"
            >
            <div class="px-4 py-3">
                <span
                class="block text-sm font-semibold text-gray-900 dark:text-white"
                >{{ Auth::user()->name }}</span
                >
                <span
                class="block text-sm text-gray-900 truncate dark:text-white"
                >{{ Auth::user()->email }}</span
                >
            </div>
            <ul
                class="py-1 text-gray-700 dark:text-gray-300"
                aria-labelledby="dropdown"
            >
                <li>
                <a
                    class="block px-4 py-2 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-400 dark:hover:text-white"
                    data-modal-target="profile-modal" data-modal-toggle="profile-modal"  type="button">
                    My profile</a
                >
                </li>
                <li>
                <a
                    href="#"
                    class="block px-4 py-2 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-400 dark:hover:text-white"
                    >Account settings</a
                >
                </li>
            </ul>
            <ul
                class="py-1 text-gray-700 dark:text-gray-300"
                aria-labelledby="dropdown"
            >
                <li>
                <a
                    href="{{route('auth.logout')}}"
                    class="block px-4 py-2 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                    >Sign out</a
                >
                </li>
            </ul>
            </div>
        </div>
        </div>
    </nav>
