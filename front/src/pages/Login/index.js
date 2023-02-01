import Button from 'components/Button';
import Divider from 'components/Divider';
import ErrorText from 'components/Error';
import Input from 'components/Input';
import { useRef } from 'react';
import { useDispatch, useSelector } from 'react-redux';
import { Link, useNavigate } from 'react-router-dom';
import { loginRequest } from 'state/modules/auth/loginSlice';
import './index.css';

const Login = () => {
    const navigate = useNavigate();
    const dispatch = useDispatch();
    const { error } = useSelector(state => state.login);

    const emailRef = useRef();
    const passwordRef = useRef();

    const submit = async () => {
        const email = emailRef.current.value;
        const password = passwordRef.current.value;
        dispatch(loginRequest({ email, password })).then(action => !action.error && navigate("/"));
    };

    return (
        <div className="login-container">
            <div className="login-area">
                <div className="login-form">
                    <Link to="/">
                        <img className="logo" src="/logo.png" alt="logo" />
                    </Link>
                    <h1 className="title">Sign In</h1>
                    <div className="form">
                        <ErrorText text={error} />
                        <Input
                            type="email"
                            placeholder="Email"
                            ref={emailRef}
                        />
                        <Input
                            type="password"
                            placeholder="Password"
                            ref={passwordRef}
                        />
                        <Button text='Sign In' onClick={submit} />
                        <Divider text="or" />
                        <div>
                            <span className="me-2 d-inline-block color-light">Don't have an account?</span>
                            <Link to="/register" className="color-main">Sign Up</Link>
                        </div>
                    </div>
                </div>
                <div className="login-image d-none d-md-block" />
            </div>
        </div>
    );
}

export default Login;