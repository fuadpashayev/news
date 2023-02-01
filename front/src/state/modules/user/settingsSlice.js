
import { createAsyncThunk, createSlice } from "@reduxjs/toolkit";
import { setDataState } from "utils/auth";
import { api } from "utils";
import { isFulfilled, isRejected } from "state/matchers";

const fetchUserSettings = createAsyncThunk("settings/fetchUserSettings", async (data) => {
    try {
        const response = await api.get("/user/settings", data);
        return { data: response.data };
    } catch (error) {
        throw Error(error.response.data.error);
    }
});

const updateUserSettings = createAsyncThunk("settings/updateUserSettings", async (data) => {
    try {
        const response = await api.post("/user/settings", data);
        return { data: response.data };
    } catch (error) {
        throw Error(error.response.data.error);
    }
});

const settingsSlice = createSlice({
    name: "settings",
    initialState: {
        data: {
            category: '',
            language: '',
        },
        status: "idle",
    },
    extraReducers: builder => {
        builder.addMatcher(isFulfilled('settings'), (state, action) => {
            setDataState(state, action.payload);
        });

        builder.addMatcher(isRejected('settings'), (state) => {
            setDataState(state, 'reset');
        });
    }
});

export default settingsSlice.reducer;
export { fetchUserSettings, updateUserSettings };