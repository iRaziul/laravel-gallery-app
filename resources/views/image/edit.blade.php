<x-app-layout title="Edit Image">
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Edit Image') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-screen-sm mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <form action="{{ route('image.update', $image) }}" method="POST" class="p-6 space-y-5 text-gray-900"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <x-auth-session-status class="mb-4" :status="session('success')" />

                    <div>
                        <x-input-label for="title" :value="__('Title')" />
                        <x-text-input name="title" id="title" class="w-full mt-2" :value="old('title', $image)" />
                        <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="description" :value="__('Description')" />
                        <x-textarea name="description" id="description" class="w-full mt-2" :value="old('description', $image)" />
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>

                    <div>
                        @if ($image->image_path)
                            <img src="{{ $image->url() }}" alt="" width="320" height="auto">
                        @endif
                    </div>
                    <div>
                        <x-input-label for="image" :value="__('Image')" />
                        <x-file-input name="image" id="image" class="w-full mt-2" />
                        <x-input-error :messages="$errors->get('image')" class="mt-2" />
                    </div>

                    <div>
                        <x-primary-button class="justify-center w-full">Save Image</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
