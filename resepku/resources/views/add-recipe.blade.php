<x-app-layout title="Tambah Resep">
    <h3 class="mb-4 text-resepku">Tulis Resepmu ...</h3>
    <form action="" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label fw-bolder">Judul</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Judul Resep: Rendang Bebek" value="{{ old('title') }}">
            @error('title')
                <div class="text-danger mt-2">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label fw-bolder">Deskripsi</label>
            <textarea type="text" class="form-control" rows="4" id="description" name="description" placeholder="Ceritakan secara singkat mengenai resep kamu">{{ old('description') }}</textarea>
            @error('description')
                <div class="text-danger mt-2">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="ingredients" class="form-label fw-bolder">Bahan - bahan</label>
            <div id="multipleFieldIngredients">
                <input type="text" class="form-control" id="ingredients" name="add_more_ingredients[0][ingredients]" placeholder="3 siung bawang merah" value="{{ old('add_more_ingredients.0.ingredients') }}">
                <input type="text" class="form-control mt-2" id="ingredients" name="add_more_ingredients[1][ingredients]" placeholder="3 siung bawang merah" value="{{ old('add_more_ingredients.1.ingredients') }}">
            </div>
            @error('add_more_ingredients.*.ingredients')
                <div class="text-danger mt-2">
                    {{ $message }}
                </div>
            @enderror
            <button type="button" name="more-ingredients" id="more-ingredients" class="btn btn-link text-resepku mt-1">+ Item Bahan</button>
        </div>
        <div class="mb-3">
            <label for="cooking_steps" class="form-label fw-bolder">Langkah Pembuatan</label>
            <div id="multipleFieldCookingSteps">
                <input type="text" class="form-control" id="cooking_steps" name="add_more_cooking_steps[0][cooking_steps]" placeholder="Iris bawang menjadi potongan kecil" value="{{ old('add_more_cooking_steps.0.cooking_steps') }}">
                <input type="text" class="form-control mt-2" id="cooking_steps" name="add_more_cooking_steps[1][cooking_steps]" placeholder="Iris bawang menjadi potongan kecil" value="{{ old('add_more_cooking_steps.1.cooking_steps') }}">
            </div>
            @error('add_more_cooking_steps.*.cooking_steps')
                <div class="text-danger mt-2">
                    {{ $message }}
                </div>
            @enderror
            <button type="button" name="add-cooking-steps" id="more-cooking-steps" class="btn btn-link text-resepku mt-1">+ Item Langkah</button>
        </div>
        <div class="mb-4">
            <label for="image" class="form-label fw-bolder">Upload Foto Masakan</label>
            <input type="file" class="form-control" id="image" name="image">
            @error('image')
                <div class="text-danger mt-2">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-5">
            <button type="submit" class="btn btn-resepku w-100">Terbitkan Resep</button>
        </div>
    </form>
</x-app-layout>