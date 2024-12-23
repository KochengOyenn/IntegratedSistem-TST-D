<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Recipe;
use Cviebrock\EloquentSluggable\Services\SlugService;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;

class RecipeController extends Controller
{
    public function index()
    {
        $recipes = Recipe::latest()->get();
        $likes = Like::latest()->get();

        return view('home', [
            'recipes' => $recipes,
            'likes' => $likes
        ]);
    }

    public function create()
    {
        return view('add-recipe');
    }

    public function store(Request $request)
    {
        // array data for ingredients & cooking steps
        $ingredients = [];
        $cooking_steps = [];

        // all of the input from users
        $input = $request->all();

        // rules for validator
        $rules = [
            'title' => 'required|min:3',
            'description' => 'required',
            'add_more_ingredients.0.ingredients' => 'required',
            'add_more_ingredients.1.ingredients' => 'required',
            'add_more_cooking_steps.0.cooking_steps' => 'required',
            'add_more_cooking_steps.1.cooking_steps' => 'required',
            'image' => ['required', 'image', 'mimes:png,jpg,jpeg,svg,PNG,JPG,JPEG', 'max:2048'],
        ];

        // custome message for validator
        $message = [
            'title.required' => 'Judul harus diisi!',
            'title.min' => 'Judul minimal harus memiliki 3 karakter!',
            'description.required' => 'Deskripsi harus diisi!',
            'add_more_ingredients.0.ingredients.required' => 'Kamu harus memasukkan minimal dua bahan resep',
            'add_more_ingredients.1.ingredients.required' => 'Kamu harus memasukkan minimal dua bahan resep',
            'add_more_cooking_steps.0.cooking_steps.required' => 'Kamu harus memasukkan minimal dua langkah memasak',
            'add_more_cooking_steps.1.cooking_steps.required' => 'Kamu harus memasukkan minimal dua langkah memasak',
            'image.required' => 'Jangan lupa tambahkan gambar untuk resepmu yaa',
        ];

        // validator for data that inputed by the user
        $validator = Validator::make($input, $rules, $message);

        // if validator failed
        if ($validator->fails()) {
            return back()->withErrors($validator)
                ->withInput();;
        }

        // store image
        if ($request->image) {
            $image_name = strtolower($request->title);
            $image = str_replace(' ', '', $image_name) . '-' . rand() . '.' . $request->image->extension();
            $request->image->move(public_path('images/recipe_images'), $image);
        }

        // iteration every ingredients input (minimal 2 ingredients) and push to array
        foreach ($request->add_more_ingredients as $value) {
            array_push($ingredients, $value['ingredients']);
        }

        // iteration every cooking steps input (minimal 2 cooking steps) and push to array
        foreach ($request->add_more_cooking_steps as $value) {
            array_push($cooking_steps, $value['cooking_steps']);
        }

        // store to database
        Recipe::create([
            'user_id' => auth()->user()->id,
            'slug' => SlugService::createSlug(Recipe::class, 'slug', $request->title . '-' . strtolower(Str::random(8))),
            'title' => $request->title,
            'description' => $request->description,
            'excerpt' => Str::limit(strip_tags($request->description), 72),
            'ingredients' => $ingredients,
            'cooking_steps' => $cooking_steps,
            'image' => $image,
        ]);

        return redirect(RouteServiceProvider::HOME)->with('success', 'Yeay! Resep Kamu Berhasil Diterbitkan 😋');
    }

    public function detail($slug)
    {
        $recipe = Recipe::where('slug', $slug)->first();
        return view('detail-recipe', [
            'recipe' => $recipe
        ]);
    }

    public function showIngredientsPrices($recipeId)
    {
        // Ambil data resep berdasarkan ID
        $recipe = Recipe::findOrFail($recipeId);
        $bahanList = json_decode($recipe->ListBahan); // Pastikan kolom ListBahan berformat JSON

        // Kirim request ke Web A
        $response = Http::get('http://localhost/api/produk/prices', [
            'bahan' => $bahanList,
        ]);

        if ($response->successful()) {
            $prices = $response->json();
            $totalPrice = collect($prices)->sum('harga_produk');

            return view('recipes.show-prices', [
                'recipe' => $recipe,
                'prices' => $prices,
                'totalPrice' => $totalPrice,
            ]);
        }

        return back()->with('error', 'Failed to fetch prices from Web A');
    }
}
