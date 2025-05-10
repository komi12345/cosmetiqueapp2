<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Product Details') }}: {{ $product->name }}
            </h2>
            <a href="{{ route('admin.products.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                {{ __('Back to Products') }}
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            @if ($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-auto object-cover rounded-lg shadow-md">
                            @else
                                <div class="w-full h-64 bg-gray-200 flex items-center justify-center rounded-lg shadow-md">
                                    <span class="text-gray-500">{{ __('No Image Available') }}</span>
                                </div>
                            @endif
                        </div>
                        <div>
                            <h3 class="text-2xl font-semibold mb-2">{{ $product->name }}</h3>
                            <p class="text-gray-700 text-lg mb-4">${{ number_format($product->price, 2) }}</p>
                            
                            <div class="mb-4">
                                <h4 class="font-semibold text-gray-700">{{ __('Description') }}:</h4>
                                <p class="text-gray-600 mt-1">{{ $product->description }}</p>
                            </div>

                            <div class="mt-6 flex space-x-3">
                                <a href="{{ route('admin.products.edit', $product) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                                    {{ __('Edit Product') }}
                                </a>
                                <form action="{{ route('admin.products.destroy', $product) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                        {{ __('Delete Product') }}
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>