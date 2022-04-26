import "./App.css";
import { useEffect } from "react";
import { HashRouter } from "react-router-dom";
import { Provider } from "react-redux";
import { useDispatch } from "react-redux";

import { store } from "./store/store";
import Header from "./components/Header/Header";
import Router from "./components/Routing/Router";
import Footer from "./components/Footer/Footer";

import { authSuccess } from "./store/auth/action";

function App() {
    const dispatch = useDispatch();
    useEffect(() => {
        if (localStorage.getItem("id")) {
            dispatch(
                authSuccess({
                    id: localStorage.getItem("id"),
                    name: localStorage.getItem("name"),
                    email: localStorage.getItem("email"),
                })
            );
        }
    }, []);
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
