<x-app-layout title="Moments shared by {{ $user->name }}">
    <div class="px-4 py-8 mx-auto max-w-7xl lg:px-8">
        <x-image-list :items="$images" />
    </div>
</x-app-layout>
