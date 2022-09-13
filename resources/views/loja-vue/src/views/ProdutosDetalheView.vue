<template>
    <main class="mt-5 col-10 m-auto">
        <div class="row">
            <div class="row m-1 mb-5">
                <h3 class="col-10">Produto</h3>
            </div>
            <div class="row">
                <div class="">
                    <div class="box">
                        <div class="box-body">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-6 text-start">
                                            {{ produto.nome }}
                                        </div>
                                        <div class="col-6 text-end">
                                            R${{ produto.valor }}
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-6 text-start">
                                            <div class="m-3 row">
                                                <label
                                                    for="quantidade"
                                                    class="col-sm-4 col-form-label"
                                                    >Quantidade</label
                                                >
                                                <div class="col-sm-4">
                                                    <input
                                                        type="numeric"
                                                        class="form-control"
                                                        id="quantidade"
                                                        v-model="quantidade"
                                                    />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 text-end">
                                            <div class="m-3 row">
                                                {{ valorTotal }}
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
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
import { useRoute, useRouter } from "vue-router";

let loading = ref(false);
let produto = ref([]);
let errorMessage = ref(null);
const store = mainStorage();
let service = ProdutosService(store.token);
let route = useRoute();
let router = useRouter();
let quantidade = ref(1);
let valorTotal = ref(0);

async function fetchData() {
    let id = route.params.id;
    try {
        loading.value = true;
        let response = await service.fetchProduto(id);
        produto.value = response.data;
        loading.value = false;
        // let valor = parseFloat(produto.value.valor.replace(/,/g, "."));
        atualizaValorTotal(produto.value.valor.replace(/,/g, "."));
    } catch (error) {
        loading.value = false;
        errorMessage.value = error;
    }
}

function atualizaValorTotal(valor) {
    valorTotal.value = new Intl.NumberFormat("pt-BR", {
        style: "currency",
        currency: "BRL",
    }).format(quantidade.value * valor);
}

onBeforeMount(() => {
    fetchData();
});
</script>
