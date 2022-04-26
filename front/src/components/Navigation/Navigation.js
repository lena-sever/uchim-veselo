import { NavLink } from "react-router-dom";
import { useDispatch, useSelector } from "react-redux";

import { selectUser } from "../../store/auth/authSelector";
import { logout } from "../../store/auth/action";
import "./Navigation.css";

import logo from "../../img/logo.png";

function Navigation() {
    const user = useSelector(selectUser);
    const dispatch = useDispatch();

    const onLogout = async () => {
        dispatch(logout());
    };

    return (
        <>
            <NavLink to="/" className="home">
                <img className="header__img" src={logo} />
            </NavLink>
            <NavLink to="/courses" className="home">
                Истории{" "}
            </NavLink>
            <NavLink to="/contacts" className="home">
                Контакты
            </NavLink>
            {user.id ? (
                <>
                    <div>{user.name}</div>
                    <NavLink
                        onClick={() => {
                            onLogout();
                        }}
                        to="/"
                        className="home"
                    >
                        Выйти
                    </NavLink>
                </>
            ) : (
                <NavLink to="/login" className="home">
                    Войти
                </NavLink>
            )}
        </>
    );
}

export default Navigation;
