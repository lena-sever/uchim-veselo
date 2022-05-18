import { applyMiddleware, combineReducers, compose, createStore } from "redux";
import thunk from "redux-thunk";
import { authReducer } from "./auth/authReducer";
import { coursesReducer } from "./courses/coursesReducer";
import { lessonsReducer } from "./lessons/lessonsReducer";
import { reviewsReducer } from "./reviews/reviewsReducer";
import { historyReducer } from "./history/historyReducer";
import { testsReducer } from "./tests/testsReducer";
import { courseIdReducer } from "./courseId/courseIdReducer";
import { resultFoundReducer } from "./resultFound/resultFoundReducer";
import { SearchWordReducer } from "./searchWord/searchWordReducer";
import { authorReducer } from "./author/authorReducer";
import { painterReducer } from "./painter/painterReducer";



const composeEnhancers = window.__REDUX_DEVTOOLS_EXTENSION_COMPOSE__ || compose;

export const store = createStore(
    combineReducers({
        coursesReducer,
        authReducer,
        lessonsReducer,
        reviewsReducer,
        historyReducer,
        testsReducer,
        courseIdReducer,
        resultFoundReducer,
        SearchWordReducer,
        authorReducer,
        painterReducer
    }),
    composeEnhancers(applyMiddleware(thunk))
);
