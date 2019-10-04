<?php

namespace Service;

use App\Models\Category;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuService
{
    public function getMenuWithCategories(array $restaurants)
    {

        $categories = Menu::whereIn('restaurant_id', $restaurants)->get()
            ->groupBy('category.name');

        return $categories;
    }

    public function createNewItem(Request $request) {
        $category = Category::where('name', $request->input('category'))
            ->where('restaurant_id', $request->input('restaurant_id'))->first();

        $menu = Menu::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'restaurant_id' => $request->input('restaurant_id'),
            'category_id' => $category->id,
        ]);

        return $menu;
    }
}
