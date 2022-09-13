<template>
    <div class="row mt-5">
        <div class="col-8 m-auto">
            <div class="card text-bg-secondary shadow-lg">
                <div v-if="errorMessage">
                    <h3 class="text-danger">{{ errorMessage }}</h3>
                </div>
                <div class="card-header bg-primary">
                    <h3 v-if="produto_id">Edição de Produto</h3>
                    <h3 v-if="!produto_id">Cadastro de Produto</h3>
                </div>
                <div class="card-body">
                    <form @submit.prevent="saveData">
                        <div class="row mb-2">
                            <div class="col-6">
                                <label>Name</label>
                                <input
                                    class="form-control"
                                    type="text"
                                    v-model="produto.nome"
                                />
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-3">
                                <label>Unidade</label>
                                <input
                                    class="form-control"
                                    type="text"
                                    v-model="produto.unidade"
                                />
                            </div>
                            <div class="col-3">
                                <label>Valor</label>
                                <input
                                    class="form-control"
                                    type="text"
                                    v-model="produto.valor"
                                />
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-3">
                                <label>Estoque</label>
                                <input
                                    class="form-control"
                                    type="text"
                                    v-model="produto.estoque"
                                />
                            </div>
                            <div class="col-3">
                                <label>Categoria</label>
                                <!-- <input
                                    class="form-control"
                                    type="text"
                                    v-model="produto.categoria_id"
                                /> -->
                                <select
                                    class="form-select"
                                    v-model="produto.categoria_id"
                                >
                                    <option
                                        v-for="categoria in categorias"
                                        :value="categoria.id"
                                        :key="categoria.id"
                                    >
                                        {{ categoria.nome }}
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-1 mt-4">
                            <input
                                v-if="!produto_id"
                                class="btn btn-success"
                                type="submit"
                                value="Cadastrar"
                            />
                            <input
                                v-if="produto_id"
                                class="btn btn-success"
                                type="submit"
                                value="Atualizar"
                            />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { reactive, ref, onMounted } from "vue";
import { useRoute, useRouter } from "vue-router";
import { CategoriasService } from "../services/CategoriasService";
import { ProdutosService } from "../services/ProdutosService";
import { mainStorage } from "../store/mainStorage";

let produto = reactive({
    nome: "",
    valor: "",
    unidade: "",
    estoque: "",
    categoria_id: "",
    fornecedor_id: "",
});
let produto_id = ref(0);
let errorMessage = ref(null);
let categorias = ref([]);
let route = useRoute();
let router = useRouter();
const store = mainStorage();
let service = ProdutosService(store.token);
let service2 = CategoriasService(store.token);

async function fetchProduto() {
    let id = route.params.id;
    try {
        let response = await service.fetchProduto(id);
        produto_id.value = response.data.id;
        produto.nome = response.data.nome;
        produto.valor = response.data.valor;
        produto.unidade = response.data.unidade;
        produto.estoque = response.data.estoque;
        produto.categoria_id = response.data.categoria_id;
        produto.fornecedor_id = store.user_id;
        console.log(produto.value);
    } catch (error) {
        errorMessage.value = error;
    }
}

async function fetchcategorias() {
    try {
        let response = await service2.fetchAllCategorias();
        categorias.value = response.data;
    } catch (error) {
        console.log(error);
    }
}

async function saveData() {
    if (!produto_id.value) {
        try {
            produto.fornecedor_id = store.user_id;
            let response = await service.createProduto(produto);
            alert(response.data.message);
            router.push("/produtos/listar");
        } catch (error) {
            errorMessage.value = error;
        }
    } else {
        try {
            let response = await service.updateProduto(
                produto,
                produto_id.value
            );
            alert(response.data.message);
            router.push("/produtos/listar");
        } catch (error) {
            errorMessage.value = error;
        }
    }
}

onMounted(() => {
    fetchcategorias();
    if (route.params.id) {
        fetchProduto();
    }
});
</script>
