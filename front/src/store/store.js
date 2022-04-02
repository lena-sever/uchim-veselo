import { applyMiddleware, combineReducers, compose, createStore } from "redux";
import thunk from "redux-thunk";
import { coursesReducer, } from "./courses/coursesReducer";
import { authReducer } from "./auth/authReducer";

const composeEnhancers = window.__REDUX_DEVTOOLS_EXTENSION_COMPOSE__ || compose;

export const store = createStore(
    combineReducers({
        coursesReducer,
        authReducer,
    }),
    composeEnhancers(applyMiddleware(thunk))
);