import { createRouter, createWebHistory } from "vue-router";
// import HomeView from "../views/HomeView.vue";

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes: [
        {
            path: "/",
            name: "home",
            // component: HomeView,
            component: () => import("@/views/LoginView.vue"),
        },
        {
            path: "/app",
            name: "app",
            component: () => import("@/components/MainLayout.vue"),
            children: [
                {
                    path: "/categorias",
                    name: "categorias",
                    component: () => import("../views/CategoriasView.vue"),
                },
                {
                    path: "/categorias/cadastro",
                    name: "categorias-cadastro",
                    component: () =>
                        import("../views/CadastroCategoriaView.vue"),
                },
                {
                    path: "/categorias/atualizar/:id",
                    name: "categorias-atualizar",
                    component: () =>
                        import("../views/CadastroCategoriaView.vue"),
                },
                {
                    path: "/produtos/listar",
                    name: "produtos-listar",
                    component: () =>
                        import("../views/ProdutosCompradorView.vue"),
                },
                {
                    path: "/produtos/fornecedor",
                    name: "produtos-fornecedor",
                    component: () => import("../views/ProdutosView.vue"),
                },
                {
                    path: "/produtos/:id",
                    name: "produtos-detalhe",
                    component: () => import("../views/ProdutosDetalheView.vue"),
                },
                {
                    path: "/produtos/cadastro",
                    name: "produtos-cadastro",
                    component: () => import("../views/CadastroProdutoView.vue"),
                },
                {
                    path: "/produtos/atualizar/:id",
                    name: "produtos-atualizar",
                    component: () => import("../views/CadastroProdutoView.vue"),
                },
                {
                    path: "/pedidos/listar",
                    name: "pedidos-listar",
                    component: () => import("../views/PedidosView.vue"),
                },
            ],
        },

        {
            path: "/about",
            name: "about",
            // route level code-splitting
            // this generates a separate chunk (About.[hash].js) for this route
            // which is lazy-loaded when the route is visited.
            component: () => import("../views/AboutView.vue"),
        },
    ],
});

export default router;
