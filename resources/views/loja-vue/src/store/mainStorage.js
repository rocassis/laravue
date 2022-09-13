import { defineStore } from "pinia";

export const mainStorage = defineStore("main", {
    state: () => {
        return {
            token: null,
            user_id: null,
            user_name: null,
            user_type: null,
        };
    },
    actions: {
        setData(data) {
            this.token = data.token;
            this.user_id = data.user;
            this.user_name = data.name;
            this.user_type = data.type;
        },

        logout() {
            this.token = null;
            this.user_id = null;
            this.user_name = null;
            this.user_type = null;
        },
    },
});
