import axios from "axios";

let base_url = import.meta.env.VITE_APP_URL + "/login";
export class LoginService {
    static loginAPI(data) {
        return axios.post(base_url, data);
    }
}
