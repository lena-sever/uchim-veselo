import { applyMiddleware, combineReducers, createStore, compose } from "redux";
import ReduxThunk from "redux-thunk";

import {coursesReducer} from './coursesReducer/coursesReducer';

export const reducers = combineReducers({
    courses: coursesReducer,
});

const composeEnhancers =
    ( window !== "undefined" &&
        window.__REDUX_DEVTOOLS_EXTENSION_COMPOSE__) ||
    compose;

export const store = createStore(
    reducers,
    composeEnhancers(applyMiddleware(ReduxThunk))
);

