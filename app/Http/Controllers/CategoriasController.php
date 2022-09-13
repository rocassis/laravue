<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoriasRequest;
use App\Models\Categorias;
use Illuminate\Support\Facades\Log;

class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($categoria = 0)
    {
        $dados = [];
        if (!$categoria) {
            $dados = Categorias::orderBy('id','asc')->get();
        } else {
            $dados = Categorias::where('id', $categoria)->first();
        }

        return response()->json($dados);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoriasRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoriasRequest $request)
    {
        try {
            $categoria = new Categorias();
            $categoria->fill($request->validated());
            $categoria->save();
            return response()->json(['message' => 'Categoria salva com sucesso!']);
        } catch (\Exception $e) {
            Log::error($e->getMessage(), (array)$e);
            return response()->json(['message' => 'Ocorreu uma falha ao salvar a categoria!'], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categorias  $categorias
     * @return \Illuminate\Http\Response
     */
    public function show(Categorias $categorias)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categorias  $categorias
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoriasRequest $request, Categorias $categoria)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoriasRequest  $request
     * @param  \App\Models\Categorias  $categorias
     * @return \Illuminate\Http\Response
     */
    public function update(CategoriasRequest $request, Categorias $categoria)
    {
        try {
            $categoria->fill($request->validated());
            $categoria->update();
            return response()->json(['message' => 'Categoria atualizada com sucesso!']);
        } catch (\Exception $e) {
            Log::error($e->getMessage(), $e);
            return response()->json(['message' => 'Ocorreu uma falha ao atualizar a categoria!'], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categorias  $categorias
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categorias $categoria)
    {
        try {
            $categoria->delete();
            return response()->json(['message' => 'Categoria excluída com sucesso!']);
        } catch (\Exception $e) {
            Log::error($e->getMessage(), $e);
            return response()->json(['message' => 'Ocorreu uma falha ao excluir a categoria!'], 500);
        }
    }
}
