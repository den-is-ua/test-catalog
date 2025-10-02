<div class="w-full">
  <div class="space-y-3">
    <h2 class="text-base font-semibold">Categories</h2>

    <div class="flex flex-col">
      @foreach ($categories as $cat)
        <button
          type="button"
          wire:key="cat-{{ $cat->id }}"
          wire:click="select({{ $cat->id }})"
          aria-pressed="{{ $activeId === $cat->id ? 'true' : 'false' }}"
          @class([
            // full-width button
            'flex w-full items-center justify-start rounded-md border px-3 py-2 text-sm transition text-center mb-2 last:mb-0',
            'focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-gray-400 focus-visible:ring-offset-2',
            'dark:focus-visible:ring-zinc-400 dark:focus-visible:ring-offset-0',

            // inactive
            'border-gray-300 text-gray-900 hover:bg-gray-100 dark:border-zinc-700 dark:text-zinc-100 dark:hover:bg-zinc-800' => $activeId !== $cat->id,

            // active
            'bg-gray-900 text-white border-gray-900 hover:bg-gray-800 dark:bg-zinc-100 dark:text-zinc-900 dark:border-zinc-100 dark:hover:bg-zinc-200' => $activeId === $cat->id,
          ])>
          {{ $cat->name }}
        </button>
      @endforeach
    </div>
  </div>
</div>
