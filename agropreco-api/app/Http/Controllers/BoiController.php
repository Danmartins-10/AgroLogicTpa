<?php

namespace App\Http\Controllers;

use App\Models\Boi;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BoiController extends Controller
{
    public function index(): JsonResponse
    {
        $registros = Boi::all();

        return response()->json([
            'success' => true,
            'data' => $registros,
        ], 200);
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'peso_atual' => 'required|numeric|min:0',
            'idade' => 'required|integer|min:0',
            'raca' => 'required|string|max:255',
            'sexo' => 'required|string|max:255',
            'data_nascimento' => 'required|date',
            'status' => 'required|string|max:255',
            'codigo_rastreio' => 'required|string|max:255|unique:bois,codigo_rastreio',
        ]);

        $registro = Boi::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Boi cadastrado com sucesso.',
            'data' => $registro,
        ], 201);
    }

    public function show(string $id): JsonResponse
    {
        $registro = Boi::find($id);

        if (!$registro) {
            return response()->json([
                'success' => false,
                'message' => 'Boi não encontrado.',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $registro,
        ], 200);
    }

    public function update(Request $request, string $id): JsonResponse
    {
        $registro = Boi::find($id);

        if (!$registro) {
            return response()->json([
                'success' => false,
                'message' => 'Boi não encontrado.',
            ], 404);
        }

        $validated = $request->validate([
            'peso_atual' => 'sometimes|numeric|min:0',
            'idade' => 'sometimes|integer|min:0',
            'raca' => 'sometimes|string|max:255',
            'sexo' => 'sometimes|string|max:255',
            'data_nascimento' => 'sometimes|date',
            'status' => 'sometimes|string|max:255',
            'codigo_rastreio' => 'sometimes|string|max:255|unique:bois,codigo_rastreio,' . $registro->id,
        ]);

        $registro->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Boi atualizado com sucesso.',
            'data' => $registro->fresh(),
        ], 200);
    }

    public function destroy(string $id): JsonResponse
    {
        $registro = Boi::find($id);

        if (!$registro) {
            return response()->json([
                'success' => false,
                'message' => 'Boi não encontrado.',
            ], 404);
        }

        $registro->delete();

        return response()->json(null, 204);
    }
}
