<?php

use Livewire\Volt\Component;
use App\Models\Post;

new class extends Component {
    public $posts;

    public function mount()
    {
        $this->posts = Post::latest()->get();
    }
}; ?>

<x-layouts.app :title="__('Posts')">
    <div class="flex flex-col gap-4">
        <div class="flex justify-between items-center">
            <h1 class="text-xl font-semibold text-gray-800 dark:text-gray-200">Posts</h1>
            <a href="{{ route('posts.create') }}"
                class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700">
                + New Post
            </a>
        </div>

        <div class="grid gap-4">
            @forelse ($posts as $post)
                <div
                    class="p-6 rounded-xl border border-neutral-200 dark:border-neutral-700 bg-white dark:bg-neutral-800">
                    <h2 class="text-lg font-bold text-gray-900 dark:text-gray-100">{{ $post->title }}</h2>
                    <p class="mt-2 text-gray-700 dark:text-gray-300 line-clamp-3">
                        {{ Str::limit($post->content, 150) }}
                    </p>
                    <div class="mt-4 flex gap-2">
                        <a href="{{ route('posts.show', $post) }}"
                            class="px-3 py-1 text-sm text-white bg-indigo-600 rounded-lg hover:bg-indigo-700">
                            View
                        </a>
                        <a href="{{ route('posts.edit', $post) }}"
                            class="px-3 py-1 text-sm text-white bg-yellow-500 rounded-lg hover:bg-yellow-600">
                            Edit
                        </a>
                        <form action="{{ route('posts.destroy', $post) }}" method="POST"
                            onsubmit="return confirm('Delete this post?')">
                            @csrf
                            @method('DELETE')
                            <button class="px-3 py-1 text-sm text-white bg-red-600 rounded-lg hover:bg-red-700">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <p class="text-gray-500 dark:text-gray-400">No posts yet.</p>
            @endforelse
        </div>
    </div>
</x-layouts.app>
