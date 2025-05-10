<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $blogPost->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-6 flex justify-between items-center">
                        <a href="{{ route('admin.blog_posts.index') }}" class="text-blue-600 hover:text-blue-800">&larr; {{ __('Back to Blog Posts') }}</a>
                        <div>
                            <a href="{{ route('admin.blog_posts.edit', $blogPost) }}" class="px-4 py-2 bg-indigo-500 text-white rounded-md hover:bg-indigo-600">{{ __('Edit Post') }}</a>
                            <form action="{{ route('admin.blog_posts.destroy', $blogPost) }}" method="POST" class="inline-block ml-2" onsubmit="return confirm('Are you sure you want to delete this post?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700">{{ __('Delete Post') }}</button>
                            </form>
                        </div>
                    </div>

                    @if ($blogPost->image)
                        <div class="mb-4">
                            <img src="{{ $blogPost->image }}" alt="{{ $blogPost->title }}" class="w-full h-auto max-h-96 object-cover rounded-lg shadow-md">
                        </div>
                    @endif

                    <div class="mb-4">
                        <h1 class="text-3xl font-bold text-gray-800">{{ $blogPost->title }}</h1>
                        <p class="text-sm text-gray-500 mt-1">
                            By <span class="font-medium">{{ $blogPost->user->name ?? __('Unknown Author') }}</span> on {{ $blogPost->created_at->format('F j, Y, g:i a') }}
                        </p>
                        @if($blogPost->created_at != $blogPost->updated_at)
                        <p class="text-sm text-gray-400 mt-1">
                            Last updated on {{ $blogPost->updated_at->format('F j, Y, g:i a') }}
                        </p>
                        @endif
                    </div>
                    
                    <div class="prose max-w-none text-gray-700">
                        {!! nl2br(e($blogPost->content)) !!} {{-- Using nl2br and e() for basic formatting and security --}}
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>