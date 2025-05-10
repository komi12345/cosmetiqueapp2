<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Welcome to the Admin Dashboard!") }}

                    <div class="mt-6">
                        <h3 class="text-lg font-medium text-gray-900">{{ __('Management Sections') }}</h3>
                        <ul class="mt-2 list-disc list-inside">
                            <li>
                                <a href="{{ route('admin.products.index') }}" class="text-blue-600 hover:text-blue-800">
                                    {{ __('Manage Products') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.collections.index') }}" class="text-blue-600 hover:text-blue-800">
                                    {{ __('Manage Collections') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.blog_posts.index') }}" class="text-blue-600 hover:text-blue-800">
                                    {{ __('Manage Blog Posts') }}
                                </a>
                            </li>
                            {{-- Links to Collections and Blog management will be added here --}}
                        </ul>
                    </div>
                    {{-- CRUD functionalities will be added here --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>