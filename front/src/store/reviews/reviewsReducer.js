import { GET_REVIEWS, ERROR, GET_REVIEW } from "./actions";

const initialReviews = {
    reviews: [],
    errMessage: "",
    reviewCourse: [],
};

export const reviewsReducer = (state = initialReviews, action) => {
    switch (action.type) {
        case GET_REVIEWS:
            return { ...state, reviews: action.reviews };
        case ERROR:
            return { ...state, errMessage: action.errMessage };
        case GET_REVIEW:
            return { ...state, reviewCourse: action.review };
        default:
            return state;
    }
};
