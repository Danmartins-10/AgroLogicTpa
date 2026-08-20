<?php

namespace App\Http\Controllers;

use App\Models\Projecao;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProjecaoController extends Controller
{
    public function index(): JsonResponse
    {
        $registros = Projecao::all();

        return response()->json([
            'success' => true,
            'data' => $registros,
        ], 200);
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'preco_esperado' => 'required|numeric|min:0',
            'metodo_calculo' => 'required|string|max:255',
            'data_previsao' => 'required|date',
        ]);

        $registro = Projecao::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Projecao cadastrado com sucesso.',
            'data' => $registro,
        ], 201);
    }

    public function show(string $id): JsonResponse
    {
        $registro = Projecao::find($id);

        if (!$registro) {
            return response()->json([
                'success' => false,
                'message' => 'Projecao não encontrado.',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $registro,
        ], 200);
    }

    public function update(Request $request, string $id): JsonResponse
    {
        $registro = Projecao::find($id);

        if (!$registro) {
            return response()->json([
                'success' => false,
                'message' => 'Projecao não encontrado.',
            ], 404);
        }

        $validated = $request->validate([
            'preco_esperado' => 'sometimes|numeric|min:0',
            'metodo_calculo' => 'sometimes|string|max:255',
            'data_previsao' => 'sometimes|date',
        ]);

        $registro->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Projecao atualizado com sucesso.',
            'data' => $registro->fresh(),
        ], 200);
    }

    public function destroy(string $id): JsonResponse
    {
        $registro = Projecao::find($id);

        if (!$registro) {
            return response()->json([
                'success' => false,
                'message' => 'Projecao não encontrado.',
            ], 404);
        }

        $registro->delete();

        return response()->json(null, 204);
    }
}
