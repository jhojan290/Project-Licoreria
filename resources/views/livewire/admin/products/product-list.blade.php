@extends('layouts.admin')

@section('content')

<div class="layout-container flex h-full grow flex-col">

    <!-- Main Container -->
    <div class="flex flex-1 justify-center py-5 sm:px-4 md:px-10 lg:px-20 xl:px-40">

        <div class="layout-content-container flex flex-col w-full max-w-7xl flex-1">

            <!-- TopNavBar -->
            <header class="flex items-center justify-between whitespace-nowrap border-b border-solid border-black/10 dark:border-white/10 px-4 md:px-10 py-3">
                <div class="flex items-center gap-4 text-gray-800 dark:text-white">
                    <div class="size-6 text-primary">
                        <svg fill="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6.04 12L2 9.624L4.978 4.376L9.02 6.748V2h6v4.748l4.042-2.372L22 9.624L17.96 12l4.04 2.376-2.978 5.248L15.02 17.252V22h-6v-4.748l-4.042 2.372L2 14.376L6.04 12z"></path>
                        </svg>
                    </div>
                    <h2 class="text-gray-800 dark:text-white text-lg font-bold leading-tight tracking-[-0.015em]">
                        LiquorAdmin
                    </h2>
                </div>
                <div class="flex flex-1 justify-end gap-4 md:gap-8">
                    <div class="hidden md:flex items-center gap-9">
                        <a class="text-gray-600 dark:text-gray-300 text-sm font-medium leading-normal hover:text-primary dark:hover:text-primary transition-colors" href="#">
                        Back to Storefront
                        </a>
                        <a class="text-gray-800 dark:text-white text-sm font-medium leading-normal hover:text-primary dark:hover:text-primary transition-colors" href="#">
                        Dashboard
                        </a>
                    </div>
                    <button class="flex max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-full h-10 w-10 bg-gray-200 dark:bg-[#3a3527] text-gray-800 dark:text-white gap-2 text-sm font-bold leading-normal tracking-[0.015em] min-w-0">
                        <span class="material-symbols-outlined text-xl">person</span>
                    </button>
                </div>
            </header>

            <!-- Main Content -->
            <main class="flex-1 px-4 md:px-10 py-8">

                <!-- Page Heading -->
                <div class="flex flex-wrap justify-between gap-4 mb-6">
                    <p class="text-gray-900 dark:text-white text-4xl font-black leading-tight tracking-[-0.033em] min-w-72">
                        Inventory Management
                    </p>
                </div>

                <!-- Toolbar -->
                <div class="flex flex-col md:flex-row justify-between items-center gap-4 p-4 rounded-lg bg-white/50 dark:bg-black/20 mb-6 border border-black/10 dark:border-white/10">
                    <div class="flex flex-col sm:flex-row gap-2 w-full md:w-auto">
                        <div class="relative w-full sm:w-64">
                            <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 dark:text-gray-500">search</span>
                            <input class="w-full h-10 pl-10 pr-4 rounded-lg bg-gray-100 dark:bg-[#27241b] border-transparent focus:ring-2 focus:ring-primary focus:border-transparent text-gray-800 dark:text-gray-200"
                                    placeholder="Search product..." type="text"/>
                        </div>
                        <select class="h-10 rounded-lg bg-gray-100 dark:bg-[#27241b] border-transparent focus:ring-2 focus:ring-primary focus:border-transparent text-gray-800 dark:text-gray-200 w-full sm:w-auto">
                            <option>All Categories</option>
                            <option>Whiskey</option>
                            <option>Gin</option>
                            <option>Wine</option>
                            <option>Tequila</option>
                            <option>Vodka</option>
                        </select>
                    </div>
                    <button 
                        type="button"
                        x-data
                        @click="$dispatch('open-modal', { view: 'create-prod' })"
                        class="flex w-full md:w-auto max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 bg-primary text-[#181611] gap-2 text-sm font-bold leading-normal tracking-[0.015em] min-w-0 px-4">
                        <span class="material-symbols-outlined text-xl">add</span>
                        <span class="truncate">Add New Product</span>
                    </button>
                </div>

                <!-- Product Table -->
                <div class="@container overflow-x-auto">
                    <div class="overflow-hidden rounded-lg border border-black/10 dark:border-[#554e3a] bg-white dark:bg-[#181611]">
                        <table class="min-w-full text-left">
                            <thead>
                                <tr class="bg-gray-50 dark:bg-[#27241b]">
                                <th class="px-4 py-3 text-gray-600 dark:text-white text-sm font-medium leading-normal">Product Name</th>
                                <th class="px-4 py-3 text-gray-600 dark:text-white text-sm font-medium leading-normal">Brand</th>
                                <th class="px-4 py-3 text-gray-600 dark:text-white text-sm font-medium leading-normal">Category</th>
                                <th class="px-4 py-3 text-gray-600 dark:text-white text-sm font-medium leading-normal text-center">Stock</th>
                                <th class="px-4 py-3 text-gray-600 dark:text-white text-sm font-medium leading-normal">Price</th>
                                <th class="px-4 py-3 text-gray-400 dark:text-[#bbb39b] text-sm font-medium leading-normal text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-black/10 dark:divide-t-[#554e3a]">
                                <!-- Repeat this TR for each product -->
                                <tr>
                                    <td class="h-[72px] px-4 py-2 text-gray-900 dark:text-white text-sm font-normal leading-normal whitespace-nowrap">Single Malt Scotch</td>
                                    <td class="h-[72px] px-4 py-2 text-gray-500 dark:text-[#bbb39b] text-sm font-normal leading-normal whitespace-nowrap">Glenfiddich</td>
                                    <td class="h-[72px] px-4 py-2 text-gray-500 dark:text-[#bbb39b] text-sm font-normal leading-normal whitespace-nowrap">Whiskey</td>
                                    <td class="h-[72px] px-4 py-2 text-sm font-normal leading-normal">
                                        <div class="flex justify-center">
                                            <span class="flex items-center justify-center rounded-md h-8 px-4 bg-gray-100 dark:bg-[#3a3527] text-gray-800 dark:text-white text-sm font-medium w-20">75</span>
                                        </div>
                                    </td>
                                    <td class="h-[72px] px-4 py-2 text-gray-500 dark:text-[#bbb39b] text-sm font-normal leading-normal whitespace-nowrap">$59.99</td>
                                    <td class="h-[72px] px-4 py-2 text-sm font-bold leading-normal tracking-[0.015em] text-right">
                                        <div class="flex items-center justify-end gap-2">
                                            <button type="button"
                                                x-data
                                                @click="$dispatch('open-modal', { view: 'edit-prod' })" 
                                                class="p-2 rounded-md hover:bg-black/5 dark:hover:bg-white/10 text-gray-500 dark:text-gray-400">
                                                <span class="material-symbols-outlined text-lg">edit</span>
                                            </button>
                                            <button class="p-2 rounded-md hover:bg-black/5 dark:hover:bg-white/10 text-red-500">
                                                <span class="material-symbols-outlined text-lg">delete</span>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <!-- Add more products here -->
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Pagination -->
                <div class="flex items-center justify-center p-4 mt-4">
                    <a class="flex size-10 items-center justify-center text-gray-500 dark:text-white hover:text-primary dark:hover:text-primary" href="#">
                        <span class="material-symbols-outlined">chevron_left</span>
                    </a>
                    <a class="text-sm font-bold leading-normal tracking-[0.015em] flex size-10 items-center justify-center text-[#181611] dark:text-[#181611] rounded-full bg-primary" href="#">1</a>
                    <a class="text-sm font-normal leading-normal flex size-10 items-center justify-center text-gray-500 dark:text-white rounded-full hover:bg-gray-100 dark:hover:bg-[#3a3527]" href="#">2</a>
                    <a class="text-sm font-normal leading-normal flex size-10 items-center justify-center text-gray-500 dark:text-white rounded-full hover:bg-gray-100 dark:hover:bg-[#3a3527]" href="#">3</a>
                    <span class="text-sm font-normal leading-normal flex size-10 items-center justify-center text-gray-500 dark:text-white rounded-full">...</span>
                    <a class="text-sm font-normal leading-normal flex size-10 items-center justify-center text-gray-500 dark:text-white rounded-full hover:bg-gray-100 dark:hover:bg-[#3a3527]" href="#">10</a>
                    <a class="flex size-10 items-center justify-center text-gray-500 dark:text-white hover:text-primary dark:hover:text-primary" href="#">
                        <span class="material-symbols-outlined">chevron_right</span>
                    </a>
                </div>

            </main>

            <!-- Footer -->
            <footer class="mt-auto px-4 md:px-10 py-6 border-t border-black/10 dark:border-white/10">
                <div class="flex flex-col md:flex-row justify-between items-center text-center md:text-left gap-4">
                    <p class="text-sm text-gray-500 dark:text-gray-400">© 2024 LiquorAdmin. All Rights Reserved.</p>
                    <div class="flex gap-6">
                        <a class="text-sm text-gray-500 dark:text-gray-400 hover:text-primary dark:hover:text-primary" href="#">Terms of Service</a>
                        <a class="text-sm text-gray-500 dark:text-gray-400 hover:text-primary dark:hover:text-primary" href="#">Privacy Policy</a>
                    </div>
                </div>
            </footer>

        </div>
    </div>
</div>
@endsection