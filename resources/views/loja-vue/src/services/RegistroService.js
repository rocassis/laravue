import axios from "axios";

let base_url = import.meta.env.VITE_APP_URL + "/registrar";
export class RegistroService {
    static registerAPI(data) {
        return axios.post(base_url, data);
    }
}
