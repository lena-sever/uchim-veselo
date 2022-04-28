import { reviewsAPI } from "../../api/api";

export const GET_REVIEWS = "GET_REVIEWS";
export const ERROR_REVIEWS = "ERROR_REVIEWS";
export const GET_REVIEW = "GET_REVIEW";
export const ERROR_REVIEW = "ERROR_REVIEW";

const getReviewsAC = (reviews) => ({ type: GET_REVIEWS, reviews });
const errorAC = (errMessage) => ({ type: ERROR_REVIEWS, errMessage });
const getReviewAC = (review) => ({ type: GET_REVIEW, review });
const errorReviewAC = (errMessageReview) => ({
    type: ERROR_REVIEW,
    errMessageReview,
});

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
            .then((res) => {
                return dispatch(getReviewAC(res.data.reviews));
            })
            .catch((err) => dispatch(errorReviewAC(err.message)));
    };
};

export const addReviewTC = (review) => {
    return (dispatch) => {
        reviewsAPI
            .addReview(review)
            .then(() => dispatch(getReviewTC(review.course_id)));
    };
};
