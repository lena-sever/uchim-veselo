import { applyMiddleware, combineReducers, compose, createStore } from "redux";
import thunk from "redux-thunk";
import { authReducer } from "./auth/authReducer";
import { coursesReducer } from "./courses/coursesReducer";
import { lessonsReducer } from "./lessons/lessonsReducer";
import { reviewsReducer } from "./reviews/reviewsReducer";
import { testsReducer } from "./tests/testsReducer";
import { courseIdReducer } from "./courseId/courseIdReducer";

const composeEnhancers = window.__REDUX_DEVTOOLS_EXTENSION_COMPOSE__ || compose;

export const store = createStore(
    combineReducers( {
        coursesReducer,
        authReducer,
        lessonsReducer,
        reviewsReducer,
        testsReducer,
        courseIdReducer,
    } ),
    composeEnhancers( applyMiddleware( thunk ) )
);
