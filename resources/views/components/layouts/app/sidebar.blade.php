<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen bg-white dark:bg-zinc-800">
        <flux:sidebar sticky stashable class="border-e border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
            <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />

                <flux:navlist variant="outline">
                    <flux:navlist.group :heading="__('Catalog')" class="grid">
                        <flux:navlist.item icon="list-bullet" :href="route('catalog.index')" wire:navigate>{{ __('Catalog') }}</flux:navlist.item>
                    </flux:navlist.group>
                </flux:navlist>  

        </flux:sidebar>

        {{ $slot }}

        @fluxScripts
    </body>
</html>
