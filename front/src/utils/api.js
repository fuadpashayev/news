import axios from "axios";

class AxiosInstance {
    static instance = null;

    static getInstance(baseURL, headers = {}) {
        if (!AxiosInstance.instance) {
            AxiosInstance.instance = axios.create({
                baseURL,
                headers,
            });
        }
        return AxiosInstance.instance;
    }

    static setHeaders(headers) {
        AxiosInstance.instance.defaults.headers.common = {
            ...AxiosInstance.instance.defaults.headers.common,
            ...headers
        };
    }
}

export default AxiosInstance;