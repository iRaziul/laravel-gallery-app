<x-app-layout title="Dashboard">
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Hello, :User', ['User' => auth()->user()->name]) }}
        </h2>
    </x-slot>

    <div class="px-4 py-8 mx-auto max-w-7xl lg:px-8">
        <x-image-list :items="$images" />
    </div>
</x-app-layout>
