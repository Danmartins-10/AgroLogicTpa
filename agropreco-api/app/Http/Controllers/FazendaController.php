<?php

namespace App\Http\Controllers;

use App\Models\Fazenda;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class FazendaController extends Controller
{
    public function index(): JsonResponse
    {
        $registros = Fazenda::all();

        return response()->json([
            'success' => true,
            'data' => $registros,
        ], 200);
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'cidade' => 'required|string|max:255',
            'estado' => 'required|string|max:255',
            'localizacao' => 'required|string|max:255',
            'contato' => 'required|string|max:255',
        ]);

        $registro = Fazenda::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Fazenda cadastrado com sucesso.',
            'data' => $registro,
        ], 201);
    }

    public function show(string $id): JsonResponse
    {
        $registro = Fazenda::find($id);

        if (!$registro) {
            return response()->json([
                'success' => false,
                'message' => 'Fazenda não encontrado.',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $registro,
        ], 200);
    }

    public function update(Request $request, string $id): JsonResponse
    {
        $registro = Fazenda::find($id);

        if (!$registro) {
            return response()->json([
                'success' => false,
                'message' => 'Fazenda não encontrado.',
            ], 404);
        }

        $validated = $request->validate([
            'nome' => 'sometimes|string|max:255',
            'cidade' => 'sometimes|string|max:255',
            'estado' => 'sometimes|string|max:255',
            'localizacao' => 'sometimes|string|max:255',
            'contato' => 'sometimes|string|max:255',
        ]);

        $registro->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Fazenda atualizado com sucesso.',
            'data' => $registro->fresh(),
        ], 200);
    }

    public function destroy(string $id): JsonResponse
    {
        $registro = Fazenda::find($id);

        if (!$registro) {
            return response()->json([
                'success' => false,
                'message' => 'Fazenda não encontrado.',
            ], 404);
        }

        $registro->delete();

        return response()->json(null, 204);
    }
}
