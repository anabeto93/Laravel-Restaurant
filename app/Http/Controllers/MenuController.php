<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMenuFormRequest;
use App\Models\Category;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Service\MenuService;

class MenuController extends Controller
{
    public function store(CreateMenuFormRequest $request, MenuService $menuService)
    {
        $menu = $menuService->createNewItem($request);
        Log::info('Created a new Menu', ['menu' => $menu]);

        return response()->json($menu, 201);
    }
}
