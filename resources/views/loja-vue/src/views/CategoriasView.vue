<template>
    <main class="mt-5 col-10 m-auto">
        <div class="row">
            <div class="row m-1 mb-5">
                <h3 class="col-10">Categorias</h3>
                <RouterLink
                    class="btn btn-success col-1"
                    to="/categorias/cadastro"
                    >Cadastrar</RouterLink
                >
            </div>
            <div class="row">
                <div class="">
                    <div class="box">
                        <div class="box-body">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Descrição</th>
                                    <th>#</th>
                                </thead>
                                <tbody>
                                    <tr
                                        v-for="categoria in categorias"
                                        :key="categoria.id"
                                    >
                                        <td>
                                            <RouterLink
                                                class="text-decoration-none"
                                                :to="{
                                                    path:
                                                        '/categorias/atualizar/' +
                                                        categoria.id,
                                                }"
                                                >{{ categoria.id }}</RouterLink
                                            >
                                        </td>
                                        <td>
                                            <RouterLink
                                                class="text-decoration-none"
                                                :to="{
                                                    path:
                                                        '/categorias/atualizar/' +
                                                        categoria.id,
                                                }"
                                                >{{
                                                    categoria.nome
                                                }}</RouterLink
                                            >
                                        </td>
                                        <td>
                                            <RouterLink
                                                class="text-decoration-none"
                                                :to="{
                                                    path:
                                                        '/categorias/atualizar/' +
                                                        categoria.id,
                                                }"
                                                >{{
                                                    categoria.descricao
                                                }}</RouterLink
                                            >
                                        </td>
                                        <td>
                                            <RouterLink
                                                class="btn btn-info btn-sm me-1"
                                                :to="{
                                                    path:
                                                        '/categorias/atualizar/' +
                                                        categoria.id,
                                                }"
                                            >
                                                <i
                                                    class="fa-solid fa-pen-to-square"
                                                ></i
                                            ></RouterLink>
                                            <button
                                                class="btn btn-danger btn-sm ms-1"
                                                @click="
                                                    deletarCategoria(
                                                        categoria.id
                                                    )
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
import { CategoriasService } from "../services/CategoriasService";
import { mainStorage } from "../store/mainStorage";

let loading = ref(false);
let categorias = ref([]);
let errorMessage = ref(null);
const store = mainStorage();
let service = CategoriasService(store.token);

async function fetchData() {
    try {
        loading.value = true;
        let response = await service.fetchAllCategorias();
        categorias.value = response.data;
        loading.value = false;
    } catch (error) {
        loading.value = false;
        errorMessage.value = error;
    }
}

async function deletarCategoria(id) {
    if (confirm("Deseja exluir este registro?") == true) {
        try {
            await service.deleteCategoria(id);
            alert("Categoria excluida com sucesso!");
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
