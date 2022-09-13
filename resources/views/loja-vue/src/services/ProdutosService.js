import axios from "axios";

export function ProdutosService(sessionToken) {
    let base_url = import.meta.env.VITE_APP_URL;
    function fetchAllProdutos() {
        let url = base_url + "/produtos";
        return axios.get(url, {
            headers: {
                Accept: "application/json",
                Authorization: "Bearer " + sessionToken,
            },
        });
    }

    function fetchOwnProdutos(id) {
        let url = base_url + "/produtos/fornecedor/" + id;
        return axios.get(url, {
            headers: {
                Accept: "application/json",
                Authorization: "Bearer " + sessionToken,
            },
        });
    }

    function fetchProduto(produto) {
        let url = base_url + "/produtos/" + produto;
        return axios.get(url, {
            headers: {
                Accept: "application/json",
                Authorization: "Bearer " + sessionToken,
            },
        });
    }

    function createProduto(data) {
        let url = base_url + "/produto";
        return axios.post(url, data, {
            headers: {
                Accept: "application/json",
                Authorization: "Bearer " + sessionToken,
            },
        });
    }

    function updateProduto(data, produto) {
        let url = base_url + "/produto/" + produto;
        return axios.post(url, data, {
            headers: {
                Accept: "application/json",
                Authorization: "Bearer " + sessionToken,
            },
        });
    }

    function deleteProduto(produto) {
        let url = base_url + "/produto/deletar/" + produto;
        return axios.get(url, {
            headers: {
                Accept: "application/json",
                Authorization: "Bearer " + sessionToken,
            },
        });
    }

    return {
        fetchAllProdutos,
        fetchOwnProdutos,
        fetchProduto,
        createProduto,
        updateProduto,
        deleteProduto,
    };
}
