<template>
    <div class="h-100">
        <div class="p-3 mx-auto text-bg-dark">
            <div v-if="store.user_type == 2">
                <NavBarFornecedor />
            </div>

            <div v-if="store.user_type == 1">
                <NavBarComprador />
            </div>
        </div>
        <div class="d-flex w-100 h-100 p-3 mx-auto flex-column bg-body">
            <RouterView />
        </div>
    </div>
</template>

<script setup>
import NavBarFornecedor from "./NavBarFornecedor.vue";
import NavBarComprador from "./NavBarComprador.vue";
import { mainStorage } from "../store/mainStorage";
import { onMounted } from "vue";
import { useRouter } from "vue-router";
const store = mainStorage();
let router = useRouter();
onMounted(() => {
    if (!store.token) {
        router.push("/");
    }
    console.log(store.$state);
});
</script>

<style>
*,
*::before,
*::after {
    box-sizing: border-box;
    margin: 0;
    position: relative;
    font-weight: normal;
}

body {
    color: var(--color-text);
    transition: color 0.5s, background-color 0.5s;
    line-height: 1.6;
    font-family: Inter, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto,
        Oxygen, Ubuntu, Cantarell, "Fira Sans", "Droid Sans", "Helvetica Neue",
        sans-serif;
    text-rendering: optimizeLegibility;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}
</style>
