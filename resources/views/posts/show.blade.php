<x-forum.layouts.app>

    <div class="w-full my-12">

        <p class="text-2xl">{{ $post->title }}</p>
        <div class="py-4">{{ $post->content }}</div>

        <livewire:comment :commentable="$post" />
    </div>

</x-forum.layouts.app>