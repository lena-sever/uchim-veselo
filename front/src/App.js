import { Provider } from "react-redux";
import { BrowserRouter, Routes, Route, Link } from "react-router-dom";

import Cours from "./components/Cours";
import { store } from "./reduxe/store";
import logo from "./logo.svg";
import "./App.css";

function App() {
    return (
        <Provider store={store}>
            <BrowserRouter>
                <div className="App">
                    <header className="App-header">
                        <img src={logo} className="App-logo" alt="logo" />
                        <p>
                            Edit <code>src/App.js</code> and save to reload.
                        </p>
                        <button className="App-link">
                            <Link to="/courses">Go to Cours</Link>
                        </button>
                    </header>
                </div>
                <Routes>
                    <Route path="/courses" element={<Cours />} />
                </Routes>
            </BrowserRouter>
        </Provider>
    );
}

export default App;
