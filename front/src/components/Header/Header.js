import Navigation from "../Navigation/Navigation";
import "./Header.css";


function Header() {
  return (
      <>
          <header class="header-wrp">
              <nav class="header__nav-wrp">
                  <Navigation />
              </nav>
          </header>
      </>
  );
}

export default Header;