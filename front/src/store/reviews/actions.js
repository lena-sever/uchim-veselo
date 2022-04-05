import { reviewsAPI } from "../../api/api";

export const GET_REVIEWS = "GET_REVIEWS";
export const ERROR = "ERROR";

const getReviewsAC = (reviews) => ({ type: GET_REVIEWS, reviews });
const errorAC = (errMessage) => ({ type: ERROR, errMessage });

export const getReviewsTC = () => {
    return (dispatch) => {
        reviewsAPI
            .getReviews()
            .then((res) => {
                dispatch(getReviewsAC(res.data));
            })
            .catch((err) => dispatch(errorAC(err.message)));
    };
};
