<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New Blog Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">{{ __('Post Details') }}</h3>

                    @if ($errors->any())
                        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-md">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.blog_posts.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Title -->
                        <div class="mb-4">
                            <label for="title" class="block text-sm font-medium text-gray-700">{{ __('Title') }}</label>
                            <input type="text" name="title" id="title" value="{{ old('title') }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 text-xl font-semibold text-gray-800 leading-snug" required>
                        </div>

                        <!-- Slug (Optional) -->
                        <div class="mb-4">
                            <label for="slug" class="block text-sm font-medium text-gray-700">{{ __('Slug (Optional)') }}</label>
                            <input type="text" name="slug" id="slug" value="{{ old('slug') }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <p class="mt-1 text-xs text-gray-500">{{ __('If left empty, a slug will be generated from the title.') }}</p>
                        </div>

                        <!-- Content -->
                        <div class="mb-4">
                            <label for="content" class="block text-sm font-medium text-gray-700">{{ __('Content') }}</label>
                            <textarea name="content" id="content" rows="10" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 text-sm text-gray-600 leading-relaxed">{{ old('content') }}</textarea>
                        </div>

                        <!-- Image -->
                        <div class="mb-4">
                            <label for="image" class="block text-sm font-medium text-gray-700">{{ __('Featured Image') }}</label>
                            <input type="file" name="image" id="image" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100"/>
                        </div>

                        <div class="flex items-center justify-end mt-6">
                            <a href="{{ route('admin.blog_posts.index') }}" class="text-sm text-gray-600 hover:text-gray-900 mr-4">
                                {{ __('Cancel') }}
                            </a>
                            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                                {{ __('Save Post') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>