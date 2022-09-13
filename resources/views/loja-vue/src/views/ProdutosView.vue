<template>
    <main class="mt-5 col-10 m-auto">
        <div class="row">
            <div class="row m-1 mb-5">
                <h3 class="col-10">Produtos</h3>
                <div class="col-2">
                    <RouterLink class="btn btn-success" to="/produtos/cadastro"
                        >Adicionar</RouterLink
                    >
                </div>
            </div>
            <div class="row">
                <div class="">
                    <div class="box">
                        <div class="box-body">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Valor</th>
                                    <th>Unidade</th>
                                    <th>Categoria</th>
                                    <th>Estoque</th>
                                    <th>#</th>
                                </thead>
                                <tbody>
                                    <tr
                                        v-for="produto in produtos"
                                        :key="produto.id"
                                    >
                                        <td>
                                            {{ produto.id }}
                                        </td>
                                        <td>
                                            {{ produto.nome }}
                                        </td>
                                        <td>
                                            {{ produto.valor }}
                                        </td>
                                        <td>
                                            {{ produto.unidade }}
                                        </td>
                                        <td>
                                            {{ produto.categoria.nome }}
                                        </td>
                                        <td>
                                            {{ produto.estoque }}
                                        </td>
                                        <td>
                                            <RouterLink
                                                class="btn btn-info btn-sm me-1"
                                                :to="{
                                                    path:
                                                        '/produtos/atualizar/' +
                                                        produto.id,
                                                }"
                                            >
                                                <i
                                                    class="fa-solid fa-pen-to-square"
                                                ></i
                                            ></RouterLink>
                                            <button
                                                class="btn btn-danger btn-sm ms-1"
                                                @click="
                                                    deletarProduto(produto.id)
                                                "
                                            >
                                                <i
                                                    class="fa-solid fa-trash-can"
                                                ></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</template>

<script setup>
import { ref, onBeforeMount } from "vue";
import { ProdutosService } from "../services/ProdutosService";
import { mainStorage } from "../store/mainStorage";

let loading = ref(false);
let produtos = ref([]);
let errorMessage = ref(null);
const store = mainStorage();
let service = ProdutosService(store.token);

async function fetchData() {
    try {
        loading.value = true;
        let response = await service.fetchOwnProdutos(store.user_id);
        produtos.value = response.data;
        loading.value = false;
    } catch (error) {
        loading.value = false;
        errorMessage.value = error;
    }
}

async function deletarProduto(id) {
    if (confirm("Deseja exluir este registro?") == true) {
        try {
            await service.deleteProduto(id);
            alert("Produto excluida com sucesso!");
            fetchData();
        } catch (error) {
            errorMessage.value = error;
        }
    } else {
        return false;
    }
}

onBeforeMount(() => {
    fetchData();
});
</script>
