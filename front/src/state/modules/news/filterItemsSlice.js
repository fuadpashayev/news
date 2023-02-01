import { createAsyncThunk, createSlice } from "@reduxjs/toolkit";
import { api, capitalize } from "utils";

const fetchFilterItems = createAsyncThunk("filterItems/fetchFilterItems", async () => {
    const response = await api.get("/filter-items");
    return response.data;
});

const mapItems = (data) => Object.keys(data).map((item) => ({
    value: data[item],
    label: capitalize(item.toLowerCase())
}));

const filterItemsSlice = createSlice({
    name: "filterItems",
    initialState: {
        categories: [],
        languages: []
    },
    extraReducers: builder => {
        builder.addCase(fetchFilterItems.fulfilled, (state, action) => {
            const { categories, languages } = action.payload;
            state.categories = mapItems(categories);
            state.languages = mapItems(languages);
        });
    }
});

export default filterItemsSlice.reducer;
export { fetchFilterItems };
export const { setFilters } = filterItemsSlice.actions;