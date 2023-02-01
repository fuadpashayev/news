import { createAsyncThunk, createSlice } from "@reduxjs/toolkit";
import { login } from "./authSlice";
import { api } from "utils";
import { fetchUserData } from "state/modules/user/userSlice";

const registerRequest = createAsyncThunk("auth/register", async (data, {dispatch}) => {
    try {
        const response = await api.post("/auth/register", { ...data });
        dispatch(login(response.data));
        dispatch(fetchUserData());
        return response.data;
    } catch (error) {
        const errors = Object.values(error.response.data.errors).flat();
        throw Error(errors.join(' '));
    }
});

const registerSlice = createSlice({
    name: "register",
    initialState: {
        status: "idle",
        error: null
    },
    extraReducers: builder => {
        builder.addCase(registerRequest.pending, (state) => {
            state.status = "loading";
            state.error = null;
        });
        builder.addCase(registerRequest.fulfilled, (state) => {
            state.status = "succeeded";
        });
        builder.addCase(registerRequest.rejected, (state, action) => {
            state.status = "failed";
            state.error = action.error.message;
        });
        
    }
});

export default registerSlice.reducer;
export { registerRequest };