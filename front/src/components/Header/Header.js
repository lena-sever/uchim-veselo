import Navigation from "../Navigation/Navigation";
import "./Header.css";
import Search from "../Search/Search";
import Logo from "../Logo/Logo";

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
                <div className="header-wrp-cent">
                <Logo/>
                <Search/>
                <Navigation/>
                </div>
              
                
            </header>
        </>
    );
}

export default Header;
