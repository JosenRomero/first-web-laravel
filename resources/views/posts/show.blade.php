<x-forum.layouts.app>

    <div class="flex items-center gap-2 w-full my-8">

        <livewire:heart :heartable="$post" />

        <div class="w-full">
            <h2 class="text-2xl font-bold md:text-3xl">
                {{ $post->title }}
            </h2>


            <div class="flex justify-between">
                <p class="text-xs text-gray-500">
                    <span class="font-semibold">
                        {{ $post->user->name }}
                    </span>
                    {{ $post->created_at->diffForHumans() }}
                </p>
                <div class="flex items-center gap-2">
                    <form action="{{ route('posts.destroy', $post) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este post?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="rounded-md bg-red-600 hover:bg-red-500 px-2 py-1 text-xs font-semibold text-white cursor-pointer">
                            Eliminar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="py-4">{{ $post->content }}</div>

    <div class="py-4">
        <livewire:comment :commentable="$post" />
    </div>

</x-forum.layouts.app>