import { NavLink } from "react-router-dom";
import { useDispatch, useSelector } from "react-redux";

import { selectLogin } from "../../store/auth/authSelector";
import { logout } from "../../store/auth/action";
import "./Navigation.css";

import logo from "../../img/logo.png";

function Navigation() {
    const loginUser = useSelector(selectLogin);
    const dispatch = useDispatch();

    const onLogout = async() => {
        dispatch(logout());
    }

    return (
        <>
            <NavLink to="/" className="home">
                <img className="header__img" src={logo} />
            </NavLink>
            <NavLink to="/courses" className="home">
                Курсы
            </NavLink>
            <NavLink to="/contacts" className="home">
                Контакты
            </NavLink>
            {loginUser ? (
                <NavLink onClick={() => {
                   onLogout();
                }} to="/" className="home">
                    Выйти
                </NavLink>
            ) : (
                <NavLink to="/login" className="home">
                    Войти
                </NavLink>
            )}
        </>
    );
}

export default Navigation;
