<div class="w-full">
  <div class="space-y-3">
    <h2 class="text-base font-semibold">Create Order</h2>

    <div class="rounded-2xl border bg-white/70 dark:bg-zinc-900/70 shadow-sm">
      {{-- success alert (flash) --}}
      @if (session('success'))
        <div class="mb-4 rounded-xl border border-green-300 bg-green-50 text-green-800 p-3">
          {{ session('success') }}
        </div>
      @endif
      <form wire:submit.prevent="submit" class="p-4 sm:p-6 space-y-4" wire:loading.attr="disabled">
        {{-- Name --}}
        <div>
          <label for="username" class="block text-sm font-medium mb-1">Username</label>
          <input
            id="username"
            type="text"
            wire:model="username"
            @class([
              'w-full rounded-xl border px-3 py-2 text-sm shadow-sm outline-none transition focus:ring-2',
              'bg-white dark:bg-zinc-900 border-zinc-300 dark:border-zinc-700 focus:border-indigo-500 focus:ring-indigo-500',
              'border-red-500 focus:border-red-500 focus:ring-red-500' => $errors->has('username'),
            ])
            placeholder="Your name"
            aria-invalid="{{ $errors->has('username') ? 'true' : 'false' }}"
            aria-describedby="{{ $errors->has('username') ? 'username-error' : '' }}"
          />
          @error('username')
            <span id="username-error" class="mt-1 block text-xs text-red-600">{{ $message }}</span>
          @enderror
        </div>

        {{-- Phone --}}
        <div>
          <label for="phone" class="block text-sm font-medium mb-1">Phone</label>
          <input
            id="phone"
            type="phone"
            wire:model="phone"
            @class([
              'w-full rounded-xl border px-3 py-2 text-sm shadow-sm outline-none transition focus:ring-2',
              'bg-white dark:bg-zinc-900 border-zinc-300 dark:border-zinc-700 focus:border-indigo-500 focus:ring-indigo-500',
              'border-red-500 focus:border-red-500 focus:ring-red-500' => $errors->has('phone'),
            ])
            placeholder="09377777777"
            aria-invalid="{{ $errors->has('phone') ? 'true' : 'false' }}"
            aria-describedby="{{ $errors->has('phone') ? 'phone-error' : '' }}"
          />
          @error('phone')
            <span id="phone-error" class="mt-1 block text-xs text-red-600">{{ $message }}</span>
          @enderror
        </div>

        {{-- Address --}}
        <div>
          <label for="address" class="block text-sm font-medium mb-1">Address</label>
          <textarea
            id="address"
            wire:model="address"
            @class([
              'w-full rounded-xl border px-3 py-2 text-sm shadow-sm outline-none transition focus:ring-2',
              'bg-white dark:bg-zinc-900 border-zinc-300 dark:border-zinc-700 focus:border-indigo-500 focus:ring-indigo-500',
              'border-red-500 focus:border-red-500 focus:ring-red-500' => $errors->has('address'),
            ])
            placeholder="Your address"
            aria-invalid="{{ $errors->has('address') ? 'true' : 'false' }}"
            aria-describedby="{{ $errors->has('address') ? 'address-error' : '' }}"
          ></textarea>
          @error('address')
            <span id="address-error" class="mt-1 block text-xs text-red-600">{{ $message }}</span>
          @enderror
        </div>

        {{-- Notes --}}
        <div>
          <label for="notes" class="block text-sm font-medium mb-1">Notes</label>
          <textarea
            id="notes"
            wire:model="notes"
            @class([
              'w-full rounded-xl border px-3 py-2 text-sm shadow-sm outline-none transition focus:ring-2',
              'bg-white dark:bg-zinc-900 border-zinc-300 dark:border-zinc-700 focus:border-indigo-500 focus:ring-indigo-500',
              'border-red-500 focus:border-red-500 focus:ring-red-500' => $errors->has('notes'),
            ])
            placeholder="Your notes"
            aria-invalid="{{ $errors->has('notes') ? 'true' : 'false' }}"
            aria-describedby="{{ $errors->has('notes') ? 'notes-error' : '' }}"
          ></textarea>
          @error('notes')
            <span id="notes-error" class="mt-1 block text-xs text-red-600">{{ $message }}</span>
          @enderror
        </div>

        {{-- Notes --}}
        <div>
          <label for="productIds" class="block text-sm font-medium mb-1">Products</label>
          <select multiple
            id="productIds"
            wire:model="productIds"
            @class([
              'w-full rounded-xl border px-3 py-2 text-sm shadow-sm outline-none transition focus:ring-2',
              'bg-white dark:bg-zinc-900 border-zinc-300 dark:border-zinc-700 focus:border-indigo-500 focus:ring-indigo-500',
              'border-red-500 focus:border-red-500 focus:ring-red-500' => $errors->has('productIds'),
            ])
            aria-invalid="{{ $errors->has('productIds') ? 'true' : 'false' }}"
            aria-describedby="{{ $errors->has('productIds') ? 'notes-error' : '' }}"
          >
            @foreach ($products as $product)

            <option value="{{ $product->getProductId() }}">{{ $product->getName() . '. Price: ' . $product->getPrice() . 'uah' }}</option>

            @endforeach
        </select>
          @error('productIds')
            <span id="productIds-error" class="mt-1 block text-xs text-red-600">{{ $message }}</span>
          @enderror
        </div>

        {{-- Submit --}}
        <div class="pt-2">
          <button
            type="submit"
            class="w-full rounded-xl px-4 py-2 text-sm font-medium shadow-sm
                   bg-black text-white hover:bg-zinc-800
                   dark:bg-white dark:text-black dark:hover:bg-zinc-200
                   transition disabled:opacity-50 disabled:cursor-not-allowed"
            wire:loading.class="opacity-70"
          >
            <span wire:loading.remove wire:target="submit">Save Order</span>
            <span wire:loading wire:target="submit">Saving…</span>
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

