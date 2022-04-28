import Navigation from "../Navigation/Navigation";
import "./Header.css";


function Header() {
    return (
        <>
            <header className="header-wrp">
                <nav className="header__nav-wrp">
                    <Navigation/>
                </nav>
            </header>
        </>
    );
}

export default Header;
