<?php

use Livewire\Volt\Component;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

new class extends Component {
    public $posts;

    public function mount()
    {
        $this->posts = Auth::user()->posts()->latest()->get();
    }

    public function delete($id)
    {
        $post = Post::findOrFail($id);

        // simple owner check (sesuaikan dengan Policy kalau perlu)
        if ($post->user_id !== Auth::id()) {
            abort(403);
        }

        $post->delete();

        // refresh daftar
        $this->posts = Auth::user()->posts()->latest()->get();
    }
};
?>

<!-- SINGLE ROOT ELEMENT -->
<section class="w-full">
    <div class="mx-auto p-6 space-y-6">
        <div class="flex justify-between items-center">
            <h1 class="text-xl font-semibold text-gray-800 dark:text-gray-200">Your Posts</h1>
            <a href="{{ route('posts.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">+
                New Post</a>
        </div>

        <div class="space-y-4">
            @forelse($posts as $post)
                <div
                    class="p-4 bg-white dark:bg-neutral-800 border border-neutral-200 dark:border-neutral-700 rounded-lg flex justify-between items-start">
                    <div>
                        <a href="{{ route('posts.edit', $post) }}"
                            class="text-lg font-medium text-blue-600 dark:text-blue-400">
                            {{ $post->title }}
                        </a>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">
                            {{ Str::limit($post->content, 100) }}</p>
                    </div>

                    <div class="flex gap-2">
                        <a href="{{ route('posts.edit', $post) }}"
                            class="px-3 py-1 bg-yellow-500 text-white rounded-md">Edit</a>
                        <button type="button" wire:click="delete({{ $post->id }})"
                            class="px-3 py-1 bg-red-600 text-white rounded-md">Delete</button>
                    </div>
                </div>
            @empty
                <p class="text-gray-600 dark:text-gray-400">No posts yet.</p>
            @endforelse
        </div>
    </div>
</section>
