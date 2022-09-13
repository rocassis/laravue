import axios from "axios";

export function CategoriasService(sessionToken) {
    let base_url = import.meta.env.VITE_APP_URL;
    function fetchAllCategorias() {
        let url = base_url + "/categorias";
        return axios.get(url, {
            headers: {
                Accept: "application/json",
                Authorization: "Bearer " + sessionToken,
            },
        });
    }

    function fetchCategoria(categoria) {
        let url = base_url + "/categorias/" + categoria;
        return axios.get(url, {
            headers: {
                Accept: "application/json",
                Authorization: "Bearer " + sessionToken,
            },
        });
    }

    function createCategoria(data) {
        let url = base_url + "/categoria";
        return axios.post(url, data, {
            headers: {
                Accept: "application/json",
                Authorization: "Bearer " + sessionToken,
            },
        });
    }

    function updateCategoria(data, categoria) {
        let url = base_url + "/categoria/" + categoria;
        return axios.post(url, data, {
            headers: {
                Accept: "application/json",
                Authorization: "Bearer " + sessionToken,
            },
        });
    }

    function deleteCategoria(categoria) {
        let url = base_url + "/categoria/deletar/" + categoria;
        return axios.get(url, {
            headers: {
                Accept: "application/json",
                Authorization: "Bearer " + sessionToken,
            },
        });
    }

    return {
        fetchAllCategorias,
        fetchCategoria,
        createCategoria,
        updateCategoria,
        deleteCategoria,
    };
}
