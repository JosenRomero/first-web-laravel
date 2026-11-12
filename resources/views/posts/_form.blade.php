<div class="mb-4">
  <label class="text-xs font-medium text-gray-700">Título de post</label>
  <input type="text" name="title" class="w-full p-2 border border-gray-700 rounded-md" value="{{ old('title', $post->title ?? '') }}" />

  @error('title')<div class="text-red-500 text-xs">{{ $message }}</div>@enderror
</div>

<div class="mb-4">
  <label class="text-xs font-medium text-gray-700">Categoría</label>
  <select name="category_id" class="w-full p-2 border border-gray-700 rounded-md appearance-none">
    <option class="text-gray-700 font-semibold" value="">Seleccione una categoría</option>

    @foreach ($categories as $category)

    <option
      class="text-gray-700"
      value="{{ $category->id }}"
      @if ($category->id == old('category_id', $post->category_id ?? '')) selected @endif
      >
      {{ $category->name }}
    </option>

    @endforeach

  </select>

  @error('category_id')<div class="text-red-500 text-xs">{{ $message }}</div>@enderror
</div>

<div class="mb-4">
  <label class="text-xs font-medium text-gray-700">Contenido</label>
  <textarea name="content" rows="6" class="w-full p-2 border border-gray-700 rounded-md">{{ old('content', $post->content ?? '') }}</textarea>

  @error('description')<div class="text-red-500 text-xs">{{ $message }}</div>@enderror
</div>