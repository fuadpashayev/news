import { createSlice } from "@reduxjs/toolkit";
import { setAuthState } from "utils/auth";

const authSlice = createSlice({
    name: "auth",
    initialState: {
        token: null,
        isLoggedIn: false,
        status: "idle",
    },
    reducers: {
        login: (state, action) => {
            setAuthState(state, action.payload);
        },
        logout: (state) => {
            setAuthState(state, 'reset');
        }
    }
});

export default authSlice.reducer;
export const { login, logout } = authSlice.actions;