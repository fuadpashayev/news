import { createSlice } from "@reduxjs/toolkit";


const filterSlice = createSlice({
    name: "filter",
    initialState: {
        keyword: '',
        dateFrom: '',
        dateTo: '',
        category: '',
        language: '',
    },
    reducers: {
        setFilters: (state, action) => {
            const { keyword, startDate, endDate, category, language } = action.payload;
            state.keyword = keyword;
            state.dateFrom = startDate;
            state.dateTo = endDate;
            state.category = category;
            state.language = language;
        }
    }
});

export default filterSlice.reducer;
export const { setFilters } = filterSlice.actions;