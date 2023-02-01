const { useSelector } = require("react-redux");

const useAuth = () => {
    const { isLoggedIn, status } = useSelector(state => state.auth);
    const { data: user } = useSelector(state => state.user);
    return { user, isLoggedIn, status };
}

export default useAuth;