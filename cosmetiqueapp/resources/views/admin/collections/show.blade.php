<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Collection') }}: {{ $collection->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-6">
                        <a href="{{ route('admin.collections.index') }}" class="text-blue-600 hover:text-blue-800">&larr; {{ __('Back to Collections') }}</a>
                        <a href="{{ route('admin.collections.edit', $collection) }}" class="ml-4 px-4 py-2 bg-indigo-500 text-white rounded-md hover:bg-indigo-600">{{ __('Edit Collection') }}</a>
                    </div>

                    {{-- @if ($collection->image) Optional
                        <div class="mb-4">
                            <h3 class="text-lg font-medium text-gray-900">{{ __('Image') }}</h3>
                            <img src="{{ $collection->image }}" alt="{{ $collection->name }}" class="mt-2 h-40 w-auto rounded shadow-md">
                        </div>
                    @endif --}}

                    <div class="mb-4">
                        <h3 class="text-lg font-medium text-gray-900">{{ __('Name') }}</h3>
                        <p class="mt-1 text-gray-600">{{ $collection->name }}</p>
                    </div>

                    <div class="mb-4">
                        <h3 class="text-lg font-medium text-gray-900">{{ __('Description') }}</h3>
                        <p class="mt-1 text-gray-600">{{ $collection->description ?: __('No description provided.') }}</p>
                    </div>

                    <div>
                        <h3 class="text-lg font-medium text-gray-900">{{ __('Associated Products') }} ({{ $collection->products->count() }})</h3>
                        @if ($collection->products->isNotEmpty())
                            <ul class="mt-2 list-disc list-inside space-y-1">
                                @foreach ($collection->products as $product)
                                    <li class="text-gray-600">
                                        <a href="{{ route('admin.products.show', $product) }}" class="text-blue-600 hover:text-blue-800">{{ $product->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p class="mt-1 text-gray-600">{{ __('No products associated with this collection.') }}</p>
                        @endif
                    </div>

                    <div class="mt-6 border-t pt-6">
                        <form action="{{ route('admin.collections.destroy', $collection) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this collection?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700">{{ __('Delete Collection') }}</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>