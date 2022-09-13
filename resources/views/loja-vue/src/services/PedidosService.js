import axios from "axios";

export function PedidosService(sessionToken) {
    let base_url = import.meta.env.VITE_APP_URL;
    function fetchOwnPedidos(id) {
        let url = base_url + "/pedidos/" + id;
        return axios.get(url, {
            headers: {
                Accept: "application/json",
                Authorization: "Bearer " + sessionToken,
            },
        });
    }

    function fetchPedido(pedido) {
        let url = base_url + "/pedidos/" + pedido;
        return axios.get(url, {
            headers: {
                Accept: "application/json",
                Authorization: "Bearer " + sessionToken,
            },
        });
    }

    function createPedido(data) {
        let url = base_url + "/pedido";
        return axios.post(url, data, {
            headers: {
                Accept: "application/json",
                Authorization: "Bearer " + sessionToken,
            },
        });
    }

    function updatePedido(data, pedido) {
        let url = base_url + "/pedido/" + pedido;
        return axios.post(url, data, {
            headers: {
                Accept: "application/json",
                Authorization: "Bearer " + sessionToken,
            },
        });
    }

    function deletePedido(pedido) {
        let url = base_url + "/pedido/deletar/" + pedido;
        return axios.get(url, {
            headers: {
                Accept: "application/json",
                Authorization: "Bearer " + sessionToken,
            },
        });
    }

    function approve(pedido) {
        let url = base_url + "/pedido/aprovar/" + pedido;
        return axios.get(url, {
            headers: {
                Accept: "application/json",
                Authorization: "Bearer " + sessionToken,
            },
        });
    }

    function refuse(pedido) {
        let url = base_url + "/pedido/recusar/" + pedido;
        return axios.get(url, {
            headers: {
                Accept: "application/json",
                Authorization: "Bearer " + sessionToken,
            },
        });
    }

    return {
        fetchOwnPedidos,
        fetchPedido,
        createPedido,
        updatePedido,
        deletePedido,
        approve,
        refuse,
    };
}
