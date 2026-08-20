<?php

namespace App\Http\Controllers;

use App\Models\Cotacao;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CotacaoController extends Controller
{
    public function index(): JsonResponse
    {
        $registros = Cotacao::all();

        return response()->json([
            'success' => true,
            'data' => $registros,
        ], 200);
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'preco_arroba' => 'required|numeric|min:0',
            'fonte_cotacao' => 'required|string|max:255',
            'data' => 'required|date',
            'regiao' => 'required|string|max:255',
        ]);

        $registro = Cotacao::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Cotacao cadastrado com sucesso.',
            'data' => $registro,
        ], 201);
    }

    public function show(string $id): JsonResponse
    {
        $registro = Cotacao::find($id);

        if (!$registro) {
            return response()->json([
                'success' => false,
                'message' => 'Cotacao não encontrado.',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $registro,
        ], 200);
    }

    public function update(Request $request, string $id): JsonResponse
    {
        $registro = Cotacao::find($id);

        if (!$registro) {
            return response()->json([
                'success' => false,
                'message' => 'Cotacao não encontrado.',
            ], 404);
        }

        $validated = $request->validate([
            'preco_arroba' => 'sometimes|numeric|min:0',
            'fonte_cotacao' => 'sometimes|string|max:255',
            'data' => 'sometimes|date',
            'regiao' => 'sometimes|string|max:255',
        ]);

        $registro->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Cotacao atualizado com sucesso.',
            'data' => $registro->fresh(),
        ], 200);
    }

    public function destroy(string $id): JsonResponse
    {
        $registro = Cotacao::find($id);

        if (!$registro) {
            return response()->json([
                'success' => false,
                'message' => 'Cotacao não encontrado.',
            ], 404);
        }

        $registro->delete();

        return response()->json(null, 204);
    }
}
