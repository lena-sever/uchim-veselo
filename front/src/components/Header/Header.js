import Navigation from "../Navigation/Navigation";

function Header() {
  return (
    <>
        <header class="header-wrp">
            <nav class="header__nav-wrp">
               <p class="home">Логотип</p>
                <a href="#" class="home">
                    <div>Courses</div>
                </a>
                <a href="#" class="home">
                    <div>Contacts</div>
                </a>
                <div class="version">Log In</div>
                <div class="version">Sing in</div>
            </nav>
            <section>
                <div class="header__content-wrp">
                    <div class="header-title">Учим весело</div>
                    <div class="header-title__react">Образовательная платформа для детей
                    </div>
                    <a class="try-btn" target="_blank" href="#">Учиться</a>
                </div>
            </section>
            
        </header>
    </>
  );
}

export default Header;