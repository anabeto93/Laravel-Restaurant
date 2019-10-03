<?php

namespace Service;

use App\Models\Menu;

class MenuService
{
    public function getMenuWithCategories(array $restaurants)
    {

        $categories = Menu::whereIn('restaurant_id', $restaurants)->get()
            ->groupBy('category.name');

        return $categories;
    }
}
