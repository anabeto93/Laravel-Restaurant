<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMenuFormRequest;
use App\Models\Category;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MenuController extends Controller
{
    public function store(CreateMenuFormRequest $request)
    {
        $category = Category::where('name', $request->input('category'))
            ->where('restaurant_id', $request->input('restaurant_id'))->first();

        $menu = Menu::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'restaurant_id' => $request->input('restaurant_id'),
            'category_id' => $category->id,
        ]);

        Log::info('Created a new Menu', ['menu' => $menu]);

        return response()->json($menu, 201);
    }
}
