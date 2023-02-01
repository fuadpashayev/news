import { createAsyncThunk, createSlice } from "@reduxjs/toolkit";
import { login } from "state/modules/auth/authSlice";
import { fetchUserSettings } from "./settingsSlice";
import { setDataState } from "utils/auth";
import { api } from "utils";
import { isFulfilled, isRejected } from "state/matchers";

const fetchUserData = createAsyncThunk("user/fetchUserData", async (tokenData = null, { dispatch }) => {
    try {
        const token = tokenData || localStorage.getItem("token");
        if (!token) return;
        dispatch(login({ token }));
        dispatch(fetchUserSettings());

        const response = await api.get("/auth/me");
        return { data: response.data };
    } catch (error) {
        throw Error(error.response.data.error);
    }
});

const updateUserData = createAsyncThunk("user/updateUserData", async (data) => {
    try {
        const response = await api.post("/auth/me", data);
        return { data: response.data };
    } catch (error) {
        throw Error(error.response.data.error);
    }
});

const userSlice = createSlice({
    name: "user",
    initialState: {
        data: {},
        status: "idle",
    },
    reducers: {
        setUser: (state, action) => {
            setDataState(state, action.payload);
        }
    },
    extraReducers: builder => {
        builder.addMatcher(isFulfilled('user'), (state, action) => {
            setDataState(state, action.payload);
        });

        builder.addMatcher(isRejected('user'), (state) => {
            setDataState(state, 'reset');
        });
    }
});

export default userSlice.reducer;
export { fetchUserData, updateUserData };
export const { setUser } = userSlice.actions;