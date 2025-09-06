<?php

use Livewire\Volt\Component;
use App\Models\Post;

new class extends Component {
    public Post $post;
    public $title;
    public $content;

    public function mount()
    {
        $this->title = $this->post->title;
        $this->content = $this->post->content;
    }

    public function update()
    {
        $this->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $this->post->update([
            'title' => $this->title,
            'content' => $this->content,
        ]);

        return redirect()->route('posts.index')->with('success', 'Post updated!');
    }
}; ?>

<x-layouts.app :title="__('Edit Post')">
    <div
        class="max-w-3xl mx-auto p-6 rounded-xl border border-neutral-200 dark:border-neutral-700 bg-white dark:bg-neutral-800">
        <h1 class="text-xl font-semibold text-gray-800 dark:text-gray-200">Edit Post</h1>

        <form wire:submit.prevent="update" class="mt-6 space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Title</label>
                <input type="text" wire:model="title"
                    class="w-full mt-1 rounded-lg border-gray-300 dark:border-neutral-600 dark:bg-neutral-900 dark:text-gray-100" />
                @error('title')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Content</label>
                <textarea wire:model="content" rows="6"
                    class="w-full mt-1 rounded-lg border-gray-300 dark:border-neutral-600 dark:bg-neutral-900 dark:text-gray-100"></textarea>
                @error('content')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex gap-2">
                <a href="{{ route('posts.index') }}"
                    class="px-4 py-2 text-sm text-gray-700 dark:text-gray-200 bg-gray-200 dark:bg-gray-700 rounded-lg hover:bg-gray-300 dark:hover:bg-gray-600">
                    Cancel
                </a>
                <button type="submit" class="px-4 py-2 text-sm text-white bg-blue-600 rounded-lg hover:bg-blue-700">
                    Update
                </button>
            </div>
        </form>
    </div>
</x-layouts.app>
