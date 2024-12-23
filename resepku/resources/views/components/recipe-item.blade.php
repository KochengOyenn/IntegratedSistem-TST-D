<div class="col-xl-4 col-lg-6 col-12 d-flex align-items-stretch">
    <div class="card flex-fill mb-4">
        <a href="{{ route('detail-recipe', $slug) }}" class="text-decoration-none d-block">
            <img src="images/recipe_images/{{ $image }}" class="card-img-top" alt="gambar-resep">
            <div class="card-body px-0">
                <h6 class="card-subtitle mb-2 text-muted fw-normal"><span>{{ $likes }}</span> Orang Menyukai ini</h6>
                <h4 class="card-title text-resepku">{{ $title }}</h4>
                <p class="card-text fw-normal text-black mb-3">{{ $excerpt }}</p>
                <a href="{{ route('recipe.like', $id) }}" class="btn btn-secondary py-2 w-100">Suka</a>
            </div>
        </a>
    </div>
</div>
