import React from "react";
import { Link } from "react-router-dom";
import { LayerLoader } from "components/Loaders";
import useAuth from "hooks/useAuth";
import './index.css';

const Layout = ({ loader = false, children }) => {
    const { user, isLoggedIn } = useAuth();

    return (
        <div>
            <LayerLoader isVisible={loader} />
            <div className="container">
                <div className="header">
                    <Link className="header-left" to="/">
                        <img src="/logo.png" className="header-logo" alt="logo" />
                        <span className="header-text">News</span>
                    </Link>
                    <div className="header-right">
                        {
                            isLoggedIn && user?.name ?
                                <>
                                    <Link className="btn btn-default text" to="/profile">{user.name}</Link>
                                    <Link className="btn btn-default text" to="/logout">Logout</Link>
                                </>
                                :
                                <>
                                    <Link className="btn btn-default text" to="/login">Login</Link>
                                    <Link className="btn btn-custom" to="/register">Sign Up</Link>
                                </>
                        }
                    </div>
                </div>
                <div className="main">
                    {children}
                </div>

            </div>
            <div className="footer">
                sd
            </div>
        </div>
    );
};

export default Layout;