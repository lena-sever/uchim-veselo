import { NavLink } from "react-router-dom";
import "./Navigation.css";

import logo from "../../img/logo.png";

function Navigation() {
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
            <NavLink to="/login" className="home">
                Войти
            </NavLink>
        </>
    );
}

export default Navigation;
