import "./Navigation.css";
import BurgerMenu from "../BurgerMenu/BurgerMenu";
import Menu from "../Menu/Menu";
import { useState } from "react";

function Navigation() {
    const [ isMenuOpen, toggleMenu ] = useState( false );

    const toggleMenuMode = () => {
        toggleMenu( !isMenuOpen );
    };

    const handleHideMenu = () => {
        console.log( "click" );
        toggleMenu( false );
    };

    return (
        <div className="header__nav-wrp">
            <BurgerMenu isMenuOpen={ isMenuOpen } toggleMenuMode={ toggleMenuMode } />
            <Menu isMenuOpen={ isMenuOpen } toggleMenuMode={ toggleMenuMode }/>
        </div>
    );
}

export default Navigation;
