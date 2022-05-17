import "./Menu.css";
import { NavLink } from "react-router-dom";
import { useDispatch, useSelector } from "react-redux";
import { selectUser } from "../../store/auth/authSelector";
import { logout } from "../../store/auth/action";

function Menu({isMenuOpen}) {
    const user = useSelector( selectUser );
    const dispatch = useDispatch();

    const onLogout = async() => {
        dispatch( logout() );
    };
    return (
        <nav className={isMenuOpen ? "menu menu__open": "menu"}>
            <NavLink to="/" className="menu__link">
                Главная
            </NavLink>
            <NavLink to="/courses" className="menu__link">
                Комиксы{ " " }
            </NavLink>
            <NavLink to="/contacts" className="menu__link">
                Контакты
            </NavLink>
            { user.id ? (
                <>
                    <div>{ user.name }</div>
                    <NavLink
                        onClick={ () => {
                            onLogout();
                        } }
                        to="/"
                        className="menu__link"
                    >
                        Выйти
                    </NavLink>
                </>
            ) : (
                <NavLink to="/login" className="menu__link">
                    Войти
                </NavLink>
            ) }
        </nav>
    );
}

export default Menu;
