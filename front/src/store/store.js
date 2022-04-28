import { applyMiddleware, combineReducers, compose, createStore } from "redux";
import thunk from "redux-thunk";
import { authReducer } from "./auth/authReducer";
import { coursesReducer } from "./courses/coursesReducer";
import { lessonsReducer } from "./lessons/lessonsReducer";
import { reviewsReducer } from "./reviews/reviewsReducer";
import { historyReducer } from "./history/historyReducer";
import { testsReducer } from "./tests/testsReducer";

const composeEnhancers = window.__REDUX_DEVTOOLS_EXTENSION_COMPOSE__ || compose;

export const store = createStore(
    combineReducers({
        coursesReducer,
        authReducer,
        lessonsReducer,
        reviewsReducer,
        historyReducer,
        testsReducer,
    }),
    composeEnhancers(applyMiddleware(thunk))
);
