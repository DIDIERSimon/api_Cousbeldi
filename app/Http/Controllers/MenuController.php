<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenuController extends Controller
{
     public function index()
    {
    	return Menu::all();
    }

    public function show($menu)
    {
    	return Menu::findOrFail($menu);
    }

    public function store(Request $request): JsonResponse
    {
    	$menu = Menu::create($request->all());
    	return response()->json($menu, 201);
    }

    public function update(Request $request, Menu $menu)
    {
    	$menu->update($request->all());
    	return response()->json($menu, 200);
    }

    public function delete(Boisson $menu)
    {
    	$menu->delete();
    	return response()->json(null, 204)
    }
}
