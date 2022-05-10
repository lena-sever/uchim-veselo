import { useLocation, useParams } from "react-router-dom";
import Navigation from "../Navigation/Navigation";
import "./Header.css";
import { useEffect } from "react";

function Header() {
    // const {  pathname  } = useLocation()
    // const params = useParams()
    //     console.log(params)

    // if (/^\/courses\/\d\/slider(1|2)$/.test(pathname)  || pathname === "/courses/1/tests") {
    //     return null
    // }

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
