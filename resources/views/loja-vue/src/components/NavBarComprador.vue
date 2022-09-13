<template>
    <nav class="navbar">
        <ul class="nav justify-content-center">
            <li class="nav-item">
                <RouterLink class="nav-link fw-bold" to="/app">Home</RouterLink>
            </li>
            <li class="nav-item">
                <RouterLink class="nav-link fw-bold" to="/produtos/listar"
                    >Produtos</RouterLink
                >
            </li>
            <li class="nav-item">
                <RouterLink class="nav-link fw-bold" to="/pedidos/listar"
                    >Pedidos</RouterLink
                >
            </li>
            <!-- <li class="nav-item">
                <RouterLink class="nav-link fw-bold" to="/register"
                    >Form Register</RouterLink
                >
            </li>
            <li class="nav-item">
                <RouterLink class="nav-link fw-bold" to="/users"
                    >Users List</RouterLink
                >
            </li>
            <li class="nav-item">
                <RouterLink class="nav-link fw-bold" to="/about"
                    >About</RouterLink
                >
            </li> -->
        </ul>
        <div class="nav-item text-end">
            <span class="nav-link"
                >Bem vindo {{ store.user_name }} | <a href="#" @click="logout">Sair?</a></span
            >
        </div>
    </nav>
</template>

<script setup>
import { mainStorage } from "../store/mainStorage";
import { useRouter } from "vue-router";
let router = useRouter();
const store = mainStorage();

function logout() {
    store.logout();
    router.push("/");
}
</script>
