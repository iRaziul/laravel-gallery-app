<x-app-layout :title="$image->title">
    <div class="px-4 pb-10 mx-auto max-w-7xl lg:px-8">
        <img src="{{ $image->url() }}" alt="{{ $image->title }}">
        <div class="p-4 bg-white shadow-sm rounded-b-xl">
            <div class="flex justify-between mb-6 text-sm text-gray-600">
                <div>Uploaded by: <a href="{{ route('user.show', $image->author) }}"
                        class="font-medium text-gray-800">{{ $image->author->name }}</a></div>
                <div>{{ $image->created_at->diffForHumans() }}</div>
            </div>
            <h1 class="mb-4 text-xl font-semibold">{{ $image->title }}</h1>
            <p class="text-gray-600">{{ $image->description }}</p>
        </div>
    </div>
</x-app-layout>
