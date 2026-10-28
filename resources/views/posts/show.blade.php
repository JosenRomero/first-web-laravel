<x-forum.layouts.app>

    <div class="w-full my-12">

        <p class="text-2xl">{{ $post->title }}</p>
        <div class="py-4">{{ $post->content }}</div>

        <!-- Comments start -->
        <ul class="my-4 space-y-2">

            @foreach($post->comments as $comment)

            <li class="flex items-center gap-2">
                <p class="text-xs bg-white/10 p-4 rounded-md">
                    <span class="text-gray-500">
                        {{ $comment->user->name }} |
                        {{ $comment->created_at->diffForHumans() }}
                    </span>
                    <span class="text-gray-300">
                        {{ $comment->content }}
                    </span>
                </p>

                <div>&hearts;</div>
            </li>

            @endforeach

        </ul>

        <p class="text-gray-500">
            <a href="#" class="rounded-md text-xs hover:underline cursor-pointer">
                Agregar comentario
            </a>
        </p>
        <!-- Comments end -->
    </div>

</x-forum.layouts.app>