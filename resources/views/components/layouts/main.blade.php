<main class="h-auto p-4 pt-20 sm:ml-64">
    <div class="p-4 mb-6 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
    {{-- @yield('header') --}}
    </div>
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
    {{-- @yield('content') --}}
    </div>

    {{ slots }}

</main>
