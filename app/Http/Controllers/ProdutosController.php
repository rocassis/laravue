<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProdutosRequest;
use App\Models\Produtos;
use Illuminate\Support\Facades\Log;

class ProdutosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($produto = 0)
    {
        $dados = [];
        if (!$produto) {
            $dados = Produtos::with('categoria:id,nome')->orderBy('id', 'asc')->get();
        } else {
            $dados = Produtos::where('id', $produto)->first();
        }

        return response()->json($dados);
    }

    public function listagemFornecedor($fornecedor)
    {
        $dados = Produtos::where('fornecedor_id', $fornecedor)->with('categoria:id,nome')->orderBy('id', 'asc')->get();

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
     * @param  \App\Http\Requests\StoreProdutosRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProdutosRequest $request)
    {
        try {
            $produto = new Produtos();
            $produto->fill($request->validated());
            $produto->save();
            return response()->json(['message' => 'Produto salvo com sucesso!']);
        } catch (\Exception $e) {
            Log::error($e->getMessage(), (array)$e);
            return response()->json(['message' => 'Ocorreu uma falha ao salvar o produto!'], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produtos  $produtos
     * @return \Illuminate\Http\Response
     */
    public function show(Produtos $produtos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produtos  $produtos
     * @return \Illuminate\Http\Response
     */
    public function edit(ProdutosRequest $request, Produtos $produto)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProdutosRequest  $request
     * @param  \App\Models\Produtos  $produtos
     * @return \Illuminate\Http\Response
     */
    public function update(ProdutosRequest $request, Produtos $produto)
    {
        try {
            $produto->fill($request->validated());
            $produto->update();
            return response()->json(['message' => 'Produto atualizado com sucesso!']);
        } catch (\Exception $e) {
            Log::error($e->getMessage(), $e);
            return response()->json(['message' => 'Ocorreu uma falha ao atualizar o produto!'], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produtos  $produtos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produtos $produto)
    {
        try {
            $produto->delete();
            return response()->json(['message' => 'Produto excluído com sucesso!']);
        } catch (\Exception $e) {
            Log::error($e->getMessage(), $e);
            return response()->json(['message' => 'Ocorreu uma falha ao excluir o produto!'], 500);
        }
    }
}
