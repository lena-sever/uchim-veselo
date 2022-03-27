import "./App.css";
import { BrowserRouter } from "react-router-dom";
import { Provider } from "react-redux";

import { store } from "./store/store";
import Header from "./components/Header/Header";
import Courses_copy from "./components/Courses_copy/Courses_copy";
import Router from "./components/Routing/Router";
import Footer from "./components/Footer/Footer";

function App() {
  return (
      <Provider store={store}>
          <div className="App">
              <BrowserRouter>
                  <Header />
                  <Courses_copy />
                  <div className="main">
                      <Router />
                  </div>
                  <Footer />
              </BrowserRouter>
          </div>
      </Provider>
  );
}

export default App;
