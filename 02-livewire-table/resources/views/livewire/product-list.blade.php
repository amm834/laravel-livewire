<div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Product name
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
            @forelse($products as $product)
                <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                       {{ $product->name }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $product->price }}
                    </td>
                    <td class="px-6 py-4">
                        <a href="#" class="font-medium text-red-600 dark:text-red-500 hover:underline">Delete</a>
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
