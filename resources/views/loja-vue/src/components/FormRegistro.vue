<template>
    <div v-if="errorMessage">
        <p class="text-danger">{{ errorMessage }}</p>
    </div>
    <div
        class="tab-pane fade"
        id="pills-profile"
        role="tabpanel"
        aria-labelledby="pills-profile-tab"
    >
        <div class="form px-4">
            <form @submit.prevent="registerUser">
                <input
                    type="text"
                    class="form-control"
                    placeholder="Nome"
                    v-model="register.name"
                />

                <input
                    type="text"
                    class="form-control"
                    placeholder="Email"
                    v-model="register.email"
                />

                <select class="form-select" v-model="register.type">
                    <option selected disabled value="0">Escolha o Tipo</option>
                    <option value="1">Comprador</option>
                    <option value="2">Fornecedor</option>
                </select>

                <input
                    type="password"
                    class="form-control"
                    placeholder="Senha"
                    v-model="register.password"
                />

                <input
                    type="password"
                    class="form-control"
                    placeholder="Confirmar Senha"
                    v-model="register.c_password"
                />

                <button type="submit" class="btn btn-dark btn-block">
                    Registrar
                </button>
            </form>
        </div>
    </div>
</template>

<script setup>
import { reactive, ref } from "vue";
import { RegistroService } from "../services/RegistroService";
let register = reactive({
    name: "",
    email: "",
    type: 0,
    password: "",
    c_password: "",
});
let errorMessage = ref(null);

async function registerUser() {
    errorMessage.value = null;
    if (!register.type) {
        alert("Escolha o tipo de usuário!");
    }

    if (register.password !== register.c_password) {
        alert("A senha e a confirmação de senha devem ser iguais!");
    }

    try {
        let response = await RegistroService.registerAPI(register);
        if (response.data.success) {
            alert("Usuário registrado com sucesso! Efetua o login!");
            //TODO
            //Limpar os valores da variavel register
        } else {
            alert("Ocorreu um erro no registro, tente novamente!");
        }
    } catch (error) {
        errorMessage.value = error;
    }
}
</script>

<style scoped>
@import "../assets/login.css";
</style>
