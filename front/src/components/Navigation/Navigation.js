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
          <a href="#" class="home">
              <div>Contacts</div>
          </a>
      </>
  );
}

export default Navigation;