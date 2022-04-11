import React from "react";
import Review from "./Review";
import { getReviewsTC } from "../../store/reviews/actions";
import { useDispatch, useSelector } from "react-redux";
import { useEffect } from "react";
import {
    selectReviews,
    selectError,
} from "../../store/reviews/reviewsSelector";
import styles from "./Reviews.module.css";
import AliceCarousel from "react-alice-carousel";
import "react-alice-carousel/lib/alice-carousel.css";

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
        debugger
        return (
            <Review
                key={review.id}
                text={review.text}
                title={review.course_title}
                user={review.user_name}
            />
        );
    });

    const style = {
        width: "1577px",
        margin: "0 auto",
    };

    const responsive = {
        0: { items: 1 },
        568: { items: 2 },
        1024: { items: 3 },
    };

    return (
        <div>
            <h1 className={styles.rev_head}>Отзывы</h1>
            <div style={style}>
                <AliceCarousel
                    items={reviewElem}
                    autoPlay
                    autoPlayInterval="2000"
                    disableDotsControls="true"
                    animationType="fadeout"
                    disableButtonsControls="false"
                    infinite="true"
                    responsive={responsive}
                />
            </div>
        </div>
    );
};

export default ReviewsContainer;
