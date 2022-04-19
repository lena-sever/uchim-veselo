import { reviewsAPI } from "../../api/api";

export const GET_REVIEWS = "GET_REVIEWS";
export const ERROR = "ERROR";
export const GET_REVIEW = "GET_REVIEW";

const getReviewsAC = (reviews) => ({ type: GET_REVIEWS, reviews });
const errorAC = (errMessage) => ({ type: ERROR, errMessage });
const getReviewAC = (review) => ({ type: GET_REVIEW, review });

export const getReviewsTC = () => {
    return (dispatch) => {
        reviewsAPI
            .getReviews()
            .then((res) => dispatch(getReviewsAC(res.data)))
            .catch((err) => dispatch(errorAC(err.message)));
    };
};

export const getReviewTC = (courseId) => {
    return (dispatch) => {
        reviewsAPI
            .getReview(courseId)
            .then((res) => dispatch(getReviewAC(res.data.reviews)))
            .catch((err) => dispatch(errorAC(err.message)));
    };
};
