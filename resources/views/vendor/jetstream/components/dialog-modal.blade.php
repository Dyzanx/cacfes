@props(['id' => null, 'maxWidth' => null])

<x-jet-modal :id="$id" :maxWidth="$maxWidth" {{ $attributes }}>
    <div class="px-6 py-4 bg-gray-100">
        <div class="text-lg text-gray-900">
            {{ $title }}
        </div>

        <div class="mt-4 text-gray-900">
            {{ $content }}
        </div>
    </div>

    <div class="px-6 py-4 bg-gray-200 text-right">
        {{ $footer }}
    </div>
</x-jet-modal>
