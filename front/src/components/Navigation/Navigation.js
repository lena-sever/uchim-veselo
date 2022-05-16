import "./Navigation.css";
// import { NavLink } from "react-router-dom";
// import { useDispatch, useSelector } from "react-redux";
// import { selectUser } from "../../store/auth/authSelector";
// import { logout } from "../../store/auth/action";
// import logo from "../../img/logo.png";
import BurgerMenu from "../BurgerMenu/BurgerMenu";
import Menu from "../Menu/Menu";
import { useState } from "react";

function Navigation() {
    const [ isMenuOpen, toggleMenu ] = useState( false );

    const toggleMenuMode = () => {
        toggleMenu( !isMenuOpen );
    };

    return (
        <div className="header__nav-wrp">
            <BurgerMenu isMenuOpen={ isMenuOpen } toggleMenuMode={ toggleMenuMode }/>
            <Menu isMenuOpen={isMenuOpen}/>
        </div>
    );
}

export default Navigation;
