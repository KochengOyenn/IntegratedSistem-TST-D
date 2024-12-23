<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Recipe;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function like($id)
    {
        $like = Like::where('recipe_id', $id)->where('user_id', auth()->user()->id)->first();

        if ($like) {
            $like->delete();
            return back();
        } else {
            Like::create([
                'recipe_id' => $id,
                'user_id' => auth()->user()->id
            ]);
            return back();
        }
    }
}
