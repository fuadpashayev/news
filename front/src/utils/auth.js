import AxiosInstance from "./api";

export const setToken = (token) => {
    AxiosInstance.setHeaders({ Authorization: `Bearer ${token}` });
    localStorage.setItem("token", token);
};

export const removeToken = () => {
    AxiosInstance.setHeaders({ Authorization: null });
    localStorage.removeItem("token");
};

export const setAuthState = (state, payload = 'reset') => {
    const isReset = payload === 'reset';
    const { token } = payload;

    state.token = isReset ? null : token;
    state.isLoggedIn = isReset ? false : !!token;
    state.status = 'finished';

    if (isReset) removeToken();
    else setToken(token);

    return state;
};

export const setDataState = (state, payload = 'reset') => {
    state.data = payload.data;
    state.status = 'finished';
    return state;
};