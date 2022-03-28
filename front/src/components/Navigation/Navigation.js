import { NavLink } from "react-router-dom";
import "./Navigation.css";

function Navigation() {
    return (
        <>
            <NavLink to="/" className="home">
                Учим-весело
            </NavLink>

            <NavLink to="/courses" className="home">
                Courses
            </NavLink>
            {/* Реализиовал переход на страницу "Contacts" */}
            <NavLink to="/contacts" className="home">
                Contacts
            </NavLink>
        </>
    );
}

export default Navigation;
