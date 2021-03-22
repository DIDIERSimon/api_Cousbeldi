<?php

namespace App\Http\Controllers;

use App\Models\Detail;
use Illuminate\Http\Request;
use App\Http\Controllers\JsonResponse;

class DetailController extends Controller
{
    public function index()
    {
        return Detail::all();
    }

    public function show($det)
    {
        return Detail::findOrFail($det);
    }

    public function store(Request $request): JsonResponse
    {
        $det = Detail::create($request->all());
        return response()->json($det, 201);
    }

    public function update(Request $request, Detail $det)
    {
        $det->update($request->all());
        return response()->json($det, 200);
    }

    public function delete(Detail $det)
    {
        $det->delete();
        return response()->json(null, 204);
    }
}
