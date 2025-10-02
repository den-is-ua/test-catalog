<div class="w-full">
  <div class="space-y-3">
    <h2 class="text-base font-semibold">Products</h2>

    <div class="flex-col space-y-3">
      @forelse ($products as $product)
        <article
          wire:key="prod-{{ $product->id }}"
          class="rounded-md border p-4 flex flex-col justify-between transition hover:shadow">
          <div>
            <h3 class="text-sm font-semibold mb-1">{{ $product->name }}</h3>
            @if ($product->description)
              <p class="text-xs text-gray-500 mb-2 line-clamp-3">{{ $product->description }}</p>
            @endif
          </div>

          <div class="mt-3 flex items-center justify-between">
            <span class="text-base font-medium">${{ number_format($product->price, 2) }}</span>
            <span class="text-sm text-gray-500">Qty: {{ $product->qty }}</span>
          </div>
        </article>
      @empty
        <div class="col-span-full text-center text-sm text-gray-500">
          No products found.
        </div>
      @endforelse
    </div>
  </div>
</div>
