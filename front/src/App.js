import "./App.css";
import { BrowserRouter } from "react-router-dom";
import Courses from "./components/Сourses/Courses";
import Header from "./components/Header/Header";
import Router from "./components/Routing/Router";
import Footer from "./components/Footer/Footer";

function App() {
  return (
    <div className="App">
      <BrowserRouter>
        <Header/>
        <div className="main">
          <Router/>
        </div>
        <Footer/>
      </BrowserRouter>
    </div>
  );
}

export default App;
