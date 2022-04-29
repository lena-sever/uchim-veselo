import {
    GET_REVIEWS,
    ERROR_REVIEWS,
    GET_REVIEW,
    ERROR_REVIEW,
} from "./actions";

const initialReviews = {
    reviews: [],
    errMessage: "",
    reviewCourse: [],
    errMessageReview: "",
};

export const reviewsReducer = (state = initialReviews, action) => {
    switch (action.type) {
        case GET_REVIEWS:
            return { ...state, reviews: action.reviews };
        case ERROR_REVIEWS:
            return { ...state, errMessage: action.errMessage };
        case GET_REVIEW:
            return { ...state, reviewCourse: action.review };
        case ERROR_REVIEW:
            return { ...state, errMessageReview: action.errMessageReview };
        default:
            return state;
    }
};
