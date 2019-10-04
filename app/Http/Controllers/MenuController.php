<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMenuFormRequest;
use Illuminate\Support\Facades\Log;
use Service\MenuService;

class MenuController extends Controller
{
    public function store(CreateMenuFormRequest $request, MenuService $menuService)
    {
        $menu = $menuService->createNewItem($request);
        Log::info('Created a new Menu', ['menu' => $menu->toArray()]);

        return response()->json($menu, 201);
    }
}
