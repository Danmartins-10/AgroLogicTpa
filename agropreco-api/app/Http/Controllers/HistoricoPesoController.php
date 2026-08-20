<?php

namespace App\Http\Controllers;

use App\Models\HistoricoPeso;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class HistoricoPesoController extends Controller
{
    public function index(): JsonResponse
    {
        $registros = HistoricoPeso::all();

        return response()->json([
            'success' => true,
            'data' => $registros,
        ], 200);
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'data' => 'required|date',
            'peso' => 'required|numeric|min:0',
        ]);

        $registro = HistoricoPeso::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'HistoricoPeso cadastrado com sucesso.',
            'data' => $registro,
        ], 201);
    }

    public function show(string $id): JsonResponse
    {
        $registro = HistoricoPeso::find($id);

        if (!$registro) {
            return response()->json([
                'success' => false,
                'message' => 'HistoricoPeso não encontrado.',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $registro,
        ], 200);
    }

    public function update(Request $request, string $id): JsonResponse
    {
        $registro = HistoricoPeso::find($id);

        if (!$registro) {
            return response()->json([
                'success' => false,
                'message' => 'HistoricoPeso não encontrado.',
            ], 404);
        }

        $validated = $request->validate([
            'data' => 'sometimes|date',
            'peso' => 'sometimes|numeric|min:0',
        ]);

        $registro->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'HistoricoPeso atualizado com sucesso.',
            'data' => $registro->fresh(),
        ], 200);
    }

    public function destroy(string $id): JsonResponse
    {
        $registro = HistoricoPeso::find($id);

        if (!$registro) {
            return response()->json([
                'success' => false,
                'message' => 'HistoricoPeso não encontrado.',
            ], 404);
        }

        $registro->delete();

        return response()->json(null, 204);
    }
}
