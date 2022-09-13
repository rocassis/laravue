<template>
    <div
        class="tab-pane fade show active"
        id="pills-home"
        role="tabpanel"
        aria-labelledby="pills-home-tab"
    >
        <div class="form px-4 pt-5">
            <form @submit.prevent="loginUser">
                <input
                    type="text"
                    class="form-control"
                    placeholder="Email"
                    v-model="login.email"
                />

                <input
                    type="password"
                    class="form-control"
                    placeholder="Senha"
                    v-model="login.password"
                />
                <button type="submit" class="btn btn-dark btn-block">
                    Login
                </button>
            </form>
        </div>
    </div>
</template>

<script setup>
import { reactive, ref } from "vue";
import { LoginService } from "../services/LoginService";
import { mainStorage } from "../store/mainStorage";
import { useRouter } from "vue-router";
let login = reactive({
    email: "",
    password: "",
});
let errorMessage = ref(null);
let store = mainStorage();
let router = useRouter();

async function loginUser() {
    errorMessage.value = null;
    if (!login.email && !login.password) {
        alert("Escolha o tipo de usuário!");
    }

    if (!login.password) {
        alert("A senha e a confirmação de senha devem ser iguais!");
    }

    try {
        let response = await LoginService.loginAPI(login);
        if (response.data.success) {
            store.token = response.data.data.token;
            store.user_name = response.data.data.name;
            store.user_type = response.data.data.type;
            store.user_id = response.data.data.user;
            router.push("/app");
        } else {
            errorMessage.value = "Usuário ou senha estão incorretos!";
        }
    } catch (error) {
        errorMessage.value = error;
    }
}
</script>

<style scoped>
    @import "../assets/login.css";
    </style>