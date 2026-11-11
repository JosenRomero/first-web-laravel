<x-forum.layouts.app>

  <div class="py-4">
    <a href="{{ route('posts.create') }}" class="rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500">Agregar Post</a>
  </div>

  <p class="my-5 text-2xl text-center">All posts</p>

  <ul>

    @foreach ($posts as $post)

    <li class="flex justify-between gap-4 py-4">
      <div class="flex gap-4">
        <div class="flex-auto">
          <p class="text-sm font-semibold">
            <a href="{{ route('posts.show', $post) }}" class="hover:underline">
              {{ $post->title }}
            </a>
          </p>
          <p class="mt-1 text-xs">
            {{ $post->user->name }}
          </p>
        </div>
      </div>
    </li>

    @endforeach

  </ul>


</x-forum.layouts.app>