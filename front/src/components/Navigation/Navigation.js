import "./Navigation.css";
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
            <Menu isMenuOpen={ isMenuOpen } toggleMenuMode={ toggleMenuMode }/>
        </div>
    );
}

export default Navigation;
