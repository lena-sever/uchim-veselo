import React from "react";
import Review from "./Review";
import { getReviewsTC } from "../../store/reviews/actions";
import { useDispatch, useSelector } from "react-redux";
import { useEffect } from "react";
import {
    selectReviews,
    selectError,
} from "../../store/reviews/reviewsSelector";

const ReviewsContainer = () => {
    const reviews = useSelector(selectReviews);
    const error = useSelector(selectError);
    const dispatch = useDispatch();
    const requestReviews = async () => {
        dispatch(getReviewsTC());
    };
    useEffect(() => {
        requestReviews();
    }, []);

    let reviewElem = reviews.map((review) => {
        return (
            <Review
                key={review.id}
                text={review.text}
                course={review.course}
                user={review.user}
            />
        );
    });

    const style = {
        display: "flex",
        justifyContent: "space-around",
        flexWrap: "wrap",
    };

    return (
        <div>
            <h1>Отзывы</h1>
            <div style={style}>{reviewElem}</div>
        </div>
    );
};

export default ReviewsContainer;
