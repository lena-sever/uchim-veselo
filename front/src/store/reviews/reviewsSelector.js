export const selectReviews = (state) => state.reviewsReducer.reviews;
export const selectErrorReviews = (state) => state.reviewsReducer.errMessage;
export const selectReview = (state) => state.reviewsReducer.reviewCourse;
export const selectErrorReview = (state) =>
    state.reviewsReducer.errMessageReview;
