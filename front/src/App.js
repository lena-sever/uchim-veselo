import "./App.css";
import { useEffect } from "react";
import { HashRouter, useLocation, withRouter } from "react-router-dom";
import { Provider } from "react-redux";
import { useDispatch } from "react-redux";
import { store } from "./store/store";
import Router from "./components/Routing/Router";
import { authMe } from "./store/auth/action";
import 'bootstrap/dist/css/bootstrap.min.css';

function App() {

    const dispatch = useDispatch();
    useEffect( () => {
        if( localStorage.getItem( "token" ) ) {
            dispatch(
                authMe()
            );
        }
    }, [] );
    return (
        <Provider store={ store }>
            <div className="App">
                <HashRouter>
                    <Router/>
                </HashRouter>
            </div>
        </Provider>
    );
}

export default App;
