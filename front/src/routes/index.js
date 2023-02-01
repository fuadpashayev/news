import { useEffect } from "react";
import { useDispatch } from "react-redux";
import { BrowserRouter, Routes, Route, Navigate } from "react-router-dom";
import { fetchFilterItems } from "state/modules/news/filterItemsSlice";
import { fetchUserData } from "state/modules/user/userSlice";
import Home from "pages/Home";
import Login from "pages/Login";
import Register from "pages/Register";
import Logout from "pages/Logout";
import Profile from "pages/Profile";
import useAuth from "hooks/useAuth";

const PageNotFound = () => {
    return <Navigate to="/" replace={true} />;
};

const Router = () => {
    const dispatch = useDispatch();
    const { isLoggedIn, user } = useAuth();

    useEffect(() => {
        dispatch(fetchUserData());
        dispatch(fetchFilterItems());
    }, []);

    return (
        <BrowserRouter>
            <Routes>
                <Route path="/" element={<Home />} />
                {isLoggedIn && user?.name?
                    <>
                        <Route path='/profile' element={<Profile />} />
                        <Route path="/logout" element={<Logout />} />
                    </>
                    :
                    <>
                        <Route path="/login" element={<Login />} />
                        <Route path="/register" element={<Register />} />
                    </>
                }
                <Route path="*" element={<PageNotFound />} />
            </Routes>
        </BrowserRouter>
    );
};

export default Router;