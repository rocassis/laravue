<script setup>
import FormLogin from "../components/FormLogin.vue";
import FormRegistro from "../components/FormRegistro.vue";
</script>

<template>
    <main>
        <div class="d-flex justify-content-center align-items-center mt-5">
            <div class="card">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item text-center">
                        <a
                            class="nav-link active btl"
                            id="pills-home-tab"
                            data-bs-toggle="tab"
                            data-bs-target="#pills-home"
                            type="button"
                            role="tab"
                            aria-controls="pills-home"
                            aria-selected="true"
                            >Login</a
                        >
                    </li>
                    <li class="nav-item text-center">
                        <a
                            class="nav-link btr"
                            id="pills-profile-tab"
                            data-bs-toggle="tab"
                            data-bs-target="#pills-profile"
                            type="button"
                            role="tab"
                            aria-controls="pills-profile"
                            aria-selected="true"
                            >Registrar</a
                        >
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <FormLogin />
                    <FormRegistro />
                </div>
            </div>
        </div>
    </main>
</template>

<style scoped>
@import "../assets/login.css";
</style>
