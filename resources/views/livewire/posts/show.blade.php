<?php

use Livewire\Volt\Component;
use App\Models\Post;

new class extends Component {
    public Post $post;
}; ?>

<x-layouts.app :title="$post->title">
    <div
        class="max-w-3xl mx-auto p-6 rounded-xl border border-neutral-200 dark:border-neutral-700 bg-white dark:bg-neutral-800">
        <h1 class="text-2xl font-bold text-gray-900 dark:text-gray-100">{{ $post->title }}</h1>
        <p class="mt-4 text-gray-700 dark:text-gray-300 whitespace-pre-line">{{ $post->content }}</p>

        <div class="mt-6 flex gap-2">
            <a href="{{ route('posts.index') }}"
                class="px-4 py-2 text-sm text-gray-700 dark:text-gray-200 bg-gray-200 dark:bg-gray-700 rounded-lg hover:bg-gray-300 dark:hover:bg-gray-600">
                Back
            </a>
            <a href="{{ route('posts.edit', $post) }}"
                class="px-4 py-2 text-sm text-white bg-yellow-500 rounded-lg hover:bg-yellow-600">
                Edit
            </a>
        </div>
    </div>
</x-layouts.app>
