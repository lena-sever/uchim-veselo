import "./App.css";
import { HashRouter } from "react-router-dom";
import { Provider } from "react-redux";

import { store } from "./store/store";
import Header from "./components/Header/Header";
import Router from "./components/Routing/Router";
import Footer from "./components/Footer/Footer";

function App() {
    return (
        <Provider store={store}>
            <div className="App">
                <HashRouter>
                    <Header />
                    <div className="main">
                        <Router />
                    </div>
                    <Footer />
                </HashRouter>
            </div>
        </Provider>
    );
}

export default App;
