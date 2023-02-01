import { createAsyncThunk, createSlice } from "@reduxjs/toolkit";
import { api } from "utils";

const fetchNews = createAsyncThunk("news/fetchNews", async (filters) => {
    try {
        const { keyword, dateFrom, dateTo, category, language } = filters;
        const response = await api.get('news', {
            params: {
                keyword,
                date_from: dateFrom,
                date_to: dateTo,
                category,
                language
            }
        });
        return response.data;
    } catch (error) {
        return { error: error.message };
    }
});

const newsSlice = createSlice({
    name: "news",
    initialState: {
        list: [],
        status: "idle",
        error: null
    },
    extraReducers: builder => {
        builder.addCase(fetchNews.pending, (state) => {
            state.status = "loading";
        });
        builder.addCase(fetchNews.fulfilled, (state, action) => {
            state.status = "succeeded";
            state.list = action.payload;
        });
        builder.addCase(fetchNews.rejected, (state, action) => {
            state.status = "failed";
            state.error = action.error.message;
        });
    }
});

export default newsSlice.reducer;
export { fetchNews };