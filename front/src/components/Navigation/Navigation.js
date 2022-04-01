import { NavLink } from "react-router-dom";
import "./Navigation.css";


import logo from '../../img/logo.png';


function Navigation() {
    return (
        <>
            <NavLink to="/" className="home">
              <img className="header__img" src={logo} />
          </NavLink>
            <NavLink to="/courses" className="home">
                Courses
            </NavLink>
            <NavLink to="/contacts" className="home">
                Contacts
            </NavLink>
        </>
    );
}

export default Navigation;
