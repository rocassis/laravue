<template>
    <div class="h-100">
        <!-- <div class="p-3 mx-auto text-bg-dark">
            <NavBarFornecedor />
        </div> -->
        <div class="">
            <RouterView />
        </div>
    </div>
</template>

<script setup>
// import NavBarFornecedor from "./components/NavBarFornecedor.vue";
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
