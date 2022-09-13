<template>
    <main class="mt-5 col-10 m-auto">
        <div class="row">
            <div class="row m-1 mb-5">
                <h3 class="col-10">Pedidos</h3>
                <div class="col-2">
                    <RouterLink class="btn btn-success" to="/pedidos/cadastro"
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
                                    <th>Status</th>
                                    <th>Valor Total</th>
                                    <th>Observação</th>
                                    <th>#</th>
                                </thead>
                                <tbody>
                                    <tr
                                        v-for="pedido in pedidos"
                                        :key="pedido.id"
                                    >
                                        <td>
                                            {{ pedido.id }}
                                        </td>
                                        <td>
                                            {{ pedido.status }}
                                        </td>
                                        <td>
                                            {{ pedido.valor_total }}
                                        </td>
                                        <td>
                                            {{ pedido.observacao }}
                                        </td>
                                        <td>
                                            <RouterLink
                                                class="btn btn-info btn-sm me-1"
                                                :to="{
                                                    path:
                                                        '/pedidos/atualizar/' +
                                                        pedido.id,
                                                }"
                                            >
                                                <i
                                                    class="fa-solid fa-pen-to-square"
                                                ></i
                                            ></RouterLink>
                                            <button
                                                class="btn btn-danger btn-sm ms-1"
                                                @click="
                                                    deletarPedido(pedido.id)
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
import { PedidosService } from "../services/PedidosService";
import { mainStorage } from "../store/mainStorage";

let loading = ref(false);
let pedidos = ref([]);
let errorMessage = ref(null);
const store = mainStorage();
let service = PedidosService(store.token);

async function fetchData() {
    try {
        loading.value = true;
        let response = await service.fetchOwnPedidos(store.user_id);
        pedidos.value = response.data;
        loading.value = false;
    } catch (error) {
        loading.value = false;
        errorMessage.value = error;
    }
}

async function deletarPedido(id) {
    if (confirm("Deseja exluir este registro?") == true) {
        try {
            await service.deletePedido(id);
            alert("Pedido excluida com sucesso!");
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
