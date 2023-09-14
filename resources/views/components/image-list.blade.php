@props(['items'])

<div class="grid grid-cols-2 gap-6 md:grid-cols-3 lg:grid-cols-4">
    @forelse ($items as $image)
        <div class="overflow-hidden bg-white shadow sm:rounded-lg">
            <div class="flex items-center justify-between p-4 text-gray-900">
                <a href="{{ route('user.show', $image->author) }}"
                    class="text-sm font-semibold hover:underline">{{ $image->author->name }}</a>
                <span class="text-xs">{{ $image->created_at->diffForHumans() }}</span>
            </div>
            <a href="{{ $image->link() }}">
                <figure class="overflow-hidden">
                    <img src="{{ $image->url() }}" alt="{{ $image->title }}"
                        class="object-cover w-full transition aspect-square hover:scale-110">
                </figure>
            </a>
            <div class="p-4">
                <a href="{{ $image->link() }}">
                    <h2 class="font-medium">{{ $image->title }}</h2>
                </a>

                @if ($image->isEditable())
                    <div class="flex mt-2 gap-x-2">
                        <a href="{{ route('image.edit', $image) }}"
                            class="border rounded-md px-3 py-1.5 text-sm hover:bg-gray-100">Edit</a>
                        @if ($image->trashed())
                            <form action="{{ route('image.restore', $image) }}" method="POST">
                                @csrf
                                <x-primary-button>Restore</x-primary-button>
                            </form>
                        @endif
                        <form action="{{ route('image.destroy', $image) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <x-danger-button>Delete</x-danger-button>
                        </form>
                    </div>
                @endif
            </div>
        </div>
    @empty
        <div class="col-span-4 py-8 text-center">
            <p class="text-lg">No images added yet</p>
            <div class="mt-5">
                <a href="{{ route('image.create') }}"
                    class="px-4 py-2 text-sm font-semibold text-blue-600 border-2 border-blue-600 rounded-xl">Add
                    Image</a>
            </div>
        </div>
    @endforelse
</div>

<div class="mt-5">
    {{ $items->links() }}
</div>
