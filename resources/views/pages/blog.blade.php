<x-forum.layouts.app>



  <p class="my-5 text-2xl text-center">All posts</p>

  <ul>

    @foreach ($posts as $post)

    <li class="flex justify-between gap-4 py-4">
      <div class="flex gap-4">
        <div class="flex-auto">
          <p class="text-sm font-semibold">
            <a href="#" class="hover:underline">
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