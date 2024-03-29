<div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <div class="my-12 mx-8 flex justify-between gap-x-4">
            <div class="flex gap-x-4">
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none"
                             stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <input
                        wire:model.debounce.500ms="searchTerm"
                        type="search" id="default-search"
                        class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Search Products" required>
                </div>
                <div>
                    <label class="sr-only" for="categories">Categories</label>
                    <select id="categories"
                            wire:model="selectedCategoryId"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected disabled>Choose a category</option>
                        @foreach($categories as $category )
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div>
                <a href="{{ route('products.create') }}" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Create Product</a>
            </div>
        </div>

        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Product name
                </th>
                <th scope="col" class="px-6 py-3">
                    Category
                </th>
                <th scope="col" class="px-6 py-3">
                    Price
                </th>
                <th scope="col" colspan="2" class="px-6 py-3">
                    Action
                </th>
            </tr>
            </thead>
            <tbody>
            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700" wire:loading>
                <th scope="row" colspan="4"
                    class="px-6 text-center py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Loading 😵‍💫
                </th>
            </tr>
            @forelse($products as $product)
                <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $product->name }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $product->category->name }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $product->price }}
                    </td>
                    <td class="px-6 py-4">
                        <a
                            onclick="confirm('Are you sure?') || event.stopImmediatePropagation()"
                            wire:click="deleteProduct('{{ $product->id }}')"
                            href="#" class="font-medium text-red-600 dark:text-red-500 hover:underline">Delete</a>
                    </td>
                    <td class="px-6 py-4">
                        <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                    </td>
                </tr>
            @empty
                <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                    <th scope="row" colspan="4"
                        class="px-6 text-center py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Out of stocks 😭
                    </th>
                </tr>
            @endforelse
            </tbody>
        </table>
        <div class="px-4 py-4">
            {{ $products->links() }}
        </div>
    </div>

</div>
