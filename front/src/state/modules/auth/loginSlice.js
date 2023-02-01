import { createAsyncThunk, createSlice } from "@reduxjs/toolkit";
import { login } from "./authSlice";
import { fetchUserData, setUser } from "state/modules/user/userSlice";
import { api } from "utils";

const loginRequest = createAsyncThunk("auth/login", async (data, {dispatch}) => {
    try {
        const response = await api.post("/auth/login", { ...data });
        dispatch(login(response.data));
        dispatch(setUser({data: response.data.user}));
        return response.data;
    } catch (error) {
        throw Error(error.response.data.error);
    }
});

const loginSlice = createSlice({
    name: "login",
    initialState: {
        status: "idle",
        error: null
    },
    extraReducers: builder => {
        builder.addCase(loginRequest.pending, (state) => {
            state.status = "loading";
            state.error = null;
        });
        builder.addCase(loginRequest.fulfilled, (state) => {
            state.status = "succeeded";
        });
        builder.addCase(loginRequest.rejected, (state, action) => {
            state.status = "failed";
            state.error = action.error.message;
        });

    }
});

export default loginSlice.reducer;
export { loginRequest };