import "./BurgerMenu.css";
import Bar from "./Bar";

function BurgerMenu({ isMenuOpen, toggleMenuMode }) {

    return (
        <div className={ isMenuOpen ? "active menu-button" : "menu-button" } onClick={ toggleMenuMode }>
            <Bar/>
            <Bar/>
            <Bar/>
        </div>

    );
}

export default BurgerMenu;
