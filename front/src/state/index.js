import { configureStore } from '@reduxjs/toolkit';
import authReducer from './modules/auth/authSlice';
import loginReducer from './modules/auth/loginSlice';
import registerReducer from './modules/auth/registerSlice';
import newsReducer from './modules/news/newsSlice';
import filterReducer from './modules/news/filterSlice';
import userReducer from './modules/user/userSlice';
import settingsReducer from './modules/user/settingsSlice';
import fiterItemsReducer from './modules/news/filterItemsSlice';

export const store = configureStore({
    reducer: {
        auth: authReducer,
        user: userReducer,
        login: loginReducer,
        register: registerReducer,
        news: newsReducer,
        filters: filterReducer,
        filterItems: fiterItemsReducer,
        settings: settingsReducer
    },
});