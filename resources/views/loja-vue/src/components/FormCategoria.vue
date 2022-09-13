<template>
    <div class="row mt-5">
        <div class="col-8 m-auto">
            <div class="card text-bg-secondary shadow-lg">
                <div v-if="errorMessage">
                    <h3 class="text-danger">{{ errorMessage }}</h3>
                </div>
                <div class="card-header bg-primary">
                    <h3 v-if="categoria_id">Edição de Categoria</h3>
                    <h3 v-if="!categoria_id">Cadastro de Categoria</h3>
                </div>
                <div class="card-body">
                    <form @submit.prevent="saveData">
                        <div class="row">
                            <div class="col-4">
                                <label>Name</label>
                                <input
                                    class="form-control"
                                    type="text"
                                    v-model="categoria.nome"
                                />
                            </div>
                            <div class="col-8">
                                <label>Descrição</label>
                                <input
                                    class="form-control"
                                    type="text"
                                    v-model="categoria.descricao"
                                />
                            </div>
                        </div>
                        <div class="col-1 mt-4">
                            <input
                                v-if="!categoria_id"
                                class="btn btn-success"
                                type="submit"
                                value="Cadastrar"
                            />
                            <input
                                v-if="categoria_id"
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
import { mainStorage } from "../store/mainStorage";
let categoria = reactive({
    nome: "",
    descricao: "",
});
let categoria_id = ref(0);
let errorMessage = ref(null);
let route = useRoute();
let router = useRouter();
const store = mainStorage();
let service = CategoriasService(store.token);

async function fetchCategoria() {
    let id = route.params.id;
    try {
        let response = await service.fetchCategoria(id);
        categoria_id.value = response.data.id;
        categoria.nome = response.data.nome;
        categoria.descricao = response.data.descricao;
        console.log(categoria.value);
    } catch (error) {
        errorMessage.value = error;
    }
}

async function saveData() {
    if (!categoria_id.value) {
        try {
            let response = await service.createCategoria(categoria);
            alert(response.data.message);
            router.push("/categorias");
        } catch (error) {
            errorMessage.value = error;
        }
    } else {
        try {
            let response = await service.updateCategoria(
                categoria,
                categoria_id.value
            );
            alert(response.data.message);
            router.push("/categorias");
        } catch (error) {
            errorMessage.value = error;
        }
    }
}

onMounted(() => {
    if (route.params.id) {
        fetchCategoria();
    }
});
</script>
