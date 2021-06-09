@props(['id' => null, 'maxWidth' => null])

<x-jet-modal :id="$id" :maxWidth="$maxWidth" {{ $attributes }}>
    <div class="px-6 py-4 bg-yellow-200">
        <div class="text-lg text-green-600">
            {{ $title }}
        </div>

        <div class="mt-4 text-green-400">
            {{ $content }}
        </div>
    </div>

    <div class="px-6 py-4 bg-yellow-300 text-right">
        {{ $footer }}
    </div>
</x-jet-modal>
