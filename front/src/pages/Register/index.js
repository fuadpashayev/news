import Button from 'components/Button';
import Divider from 'components/Divider';
import ErrorText from 'components/Error';
import Input from 'components/Input';
import { useRef } from 'react';
import { useDispatch, useSelector } from 'react-redux';
import { Link, useNavigate } from 'react-router-dom';
import { registerRequest } from 'state/modules/auth/registerSlice';
import './index.css';

const Register = () => {
    const navigate = useNavigate();
    const dispatch = useDispatch();
    const { error } = useSelector(state => state.register);

    const nameRef = useRef();
    const emailRef = useRef();
    const passwordRef = useRef();

    const submit = async () => {
        const name = nameRef.current.value;
        const email = emailRef.current.value;
        const password = passwordRef.current.value;
        dispatch(registerRequest({ name, email, password })).then(action => !action.error && navigate("/"));
    };

    return (
        <div className="login-container">
            <div className="login-area">
                <div className="login-form">
                    <Link to="/">
                        <img className="logo" src="/logo.png" alt="logo" />
                    </Link>
                    <h1 className="title">Sign Up</h1>
                    <div className="form">
                        <ErrorText text={error} />
                        <Input type="text" placeholder="Name" ref={nameRef} />
                        <Input type="email" placeholder="Email" ref={emailRef} />
                        <Input type="password" placeholder="Password" ref={passwordRef} />
                        <Button text='Sign Up' onClick={submit} />
                        <Divider text="or" />
                        <div>
                            <span className="me-2 d-inline-block color-light">Have an account?</span>
                            <Link to="/login" className="color-main">Sign In</Link>
                        </div>
                    </div>
                </div>
                <div className="login-image login-image d-none d-md-block" />
            </div>
        </div>
    );
}

export default Register;