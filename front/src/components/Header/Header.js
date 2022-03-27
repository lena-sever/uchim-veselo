import Navigation from "../Navigation/Navigation";
import "./Header.css";


function Header() {
  return (
      <>
          <header class="header-wrp">
              <nav class="header__nav-wrp">
                  <Navigation />
                  <div class="version">Log In</div>
                  <div class="version">Sing in</div>
              </nav>
          </header>
      </>
  );
}

export default Header;