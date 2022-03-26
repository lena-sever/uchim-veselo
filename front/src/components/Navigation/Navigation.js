import { NavLink } from "react-router-dom";
import "./Navigation.css";

function Navigation() {

  return (
    <nav className="nav">
      <li><NavLink to="/" className="nav__links">Home</NavLink></li>
      <li><NavLink to="/courses" className="nav__links">Courses</NavLink></li>
    </nav>
  );
}

export default Navigation;