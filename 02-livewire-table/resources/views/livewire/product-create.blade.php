<div>
    <div
        class="p-6 max-w-lg mx-auto bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <form wire:submit.prevent="createProduct">
            <div class="grid gap-6 mb-6">
                <div>
                    <label for="first_name"
                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                    <input
                        wire:model="product.name"
                        type="text" id="first_name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    >
                    @error('product.name')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="grid gap-6 mb-6">
                    <div>
                        <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                        <input
                            wire:model="product.price"
                            type="number" id="first_name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           >
                        @error('product.price')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div>
                    <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select a
                        category</label>
                    <select id="countries"
                            wire:model="product.category_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected disabled>Choose a category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">  {{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('product.category_id')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                    Create
                </button>
            </div>
        </form>
    </div>
</div>
