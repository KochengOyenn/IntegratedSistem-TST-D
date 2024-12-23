<x-app-layout title="Home">
    @if ($recipes->isEmpty())
        <x-recipe-empty/>
    @else
        <h4 class="mb-4">Resep Terbaru</h4>
        <section class="recipe-item row justify-content-between">
            @foreach ($recipes as $recipe)
                <x-recipe-item 
                    id="{{ $recipe->id }}"
                    slug="{{ $recipe->slug }}" 
                    likes="{{ ($likes->where('recipe_id', $recipe->id)->count()) }}"
                    title="{{ $recipe->title }}" 
                    image="{{ $recipe->image }}" 
                    excerpt="{{ $recipe->excerpt }}" 
                />
            @endforeach
        </section>
    @endif
</x-app-layout>