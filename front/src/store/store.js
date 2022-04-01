import { applyMiddleware, combineReducers, compose, createStore } from "redux";
import thunk from "redux-thunk";
import { coursesReducer } from "./courses/coursesReducer";
import { lessonsReducer } from "./lessons/lessonsReducer";

const composeEnhancers = window.__REDUX_DEVTOOLS_EXTENSION_COMPOSE__ || compose;

export const store = createStore(
    combineReducers( {
        coursesReducer,
        lessonsReducer
    } ),
    composeEnhancers( applyMiddleware( thunk ) )
);
