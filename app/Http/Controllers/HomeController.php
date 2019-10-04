<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Service\MenuService;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(MenuService $menuService)
    {
        $restaurant_id = 1;
        $menus = $menuService->getMenuWithCategories($restaurant_id);

        return view('home', compact('menus', 'restaurant_id'));
    }
}
