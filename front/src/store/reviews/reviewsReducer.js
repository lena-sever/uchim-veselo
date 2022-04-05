import { GET_REVIEWS, ERROR } from "./actions";

const initialReviews = {
    reviews: [],
    errMessage: "",
};

export const reviewsReducer = (state = initialReviews, action) => {
    switch (action.type) {
        case GET_REVIEWS:
            return { ...state, reviews: action.reviews };
        case ERROR:
            return { ...state, errMessage: action.errMessage };
        default:
            return state;
    }
};
