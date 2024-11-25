<div class="bg-gray-200 col-12">
    <div class="p-5 min-h-screen container">

        <div class="mb-4">
            <div class="flex flex-wrap items-center justify-between space-y-4 md:space-y-0">
                <!-- Dropdown -->
                <div class="flex items-center space-x-2">
                    <label for="perPage" class="text-gray-700 font-medium">Items per page:</label>
                    <select 
                        wire:model.live="perPage" 
                        id="perPage" 
                        class="border-white rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 px-3 py-2"
                    >
                        @foreach($options as $option)
                            <option value="{{ $option }}">{{ $option }}</option>
                        @endforeach
                    </select>
                </div>
        
                <!-- Search -->
                <div class="flex items-center w-full md:w-auto">
                    <input 
                        type="text" 
                        placeholder="Search here" 
                        wire:model.live.debounce.300ms="search" 
                        class="w-full md:w-64 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 px-3 py-2"
                    >
                </div>
            </div>
        </div>
        

        <!-- Items list -->
        <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 rounded-lg col-6">
            <table class="min-w-full divide-y divide-gray-300">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-sm font-semibold text-gray-900">
                            <a href="javascript:void(0)" wire:click="sortBy('name')" >Name @if ($sortColumn === 'name') @if ($sortDirection === 'ASC') &uarr;  @else &darr; @endif</a>
                        @endif
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 bg-white">
                    @foreach($items as $item)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $item->name }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination links -->
        <div class="mt-4">
            {{ $items->links() }}
        </div>
    </div>
</div>
