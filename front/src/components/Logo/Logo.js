import { NavLink } from "react-router-dom";
import logo from "../../img/logo.png";

function Logo() {
    return (

        <NavLink to='/'>
            <img className="header__img" src={ logo }/>
        </NavLink>

    );
}

export default Logo;
