<?php

use Livewire\Volt\Component;
use App\Models\Post;

new class extends Component {
    public Post $post;
}; ?>

<section class="w-full">
    <div
        class="mx-auto p-6 rounded-xl border border-neutral-200 dark:border-neutral-700 bg-white dark:bg-neutral-800">
        <h1 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 mb-4">
            {{ $post->title }}
        </h1>

        <div class="prose dark:prose-invert max-w-none">
            {!! nl2br(e($post->content)) !!}
        </div>

        <div class="mt-6 flex gap-2">
            <a href="{{ route('posts.index') }}"
                class="px-4 py-2 text-sm text-gray-700 dark:text-gray-200 bg-gray-200 dark:bg-gray-700 rounded-lg hover:bg-gray-300 dark:hover:bg-gray-600">
                Back
            </a>
            <a href="{{ route('posts.edit', $post) }}"
                class="px-4 py-2 text-sm text-white bg-blue-600 rounded-lg hover:bg-blue-700">
                Edit
            </a>
        </div>
    </div>
</section>
