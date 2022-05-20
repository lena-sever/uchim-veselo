import React from "react";
import Review from "./Review/Review";
import { getReviewsTC } from "../../store/reviews/actions";
import { useDispatch, useSelector } from "react-redux";
import { useEffect } from "react";
import {
    selectReviews,
    selectErrorReviews,
} from "../../store/reviews/reviewsSelector";
import styles from "./Review/Review.module.css";
import AliceCarousel from "react-alice-carousel";
import "react-alice-carousel/lib/alice-carousel.css";

const ReviewsContainer = () => {
    const reviews = useSelector( selectReviews );
    const error = useSelector( selectErrorReviews );
    const dispatch = useDispatch();
    const requestReviews = async() => {
        dispatch( getReviewsTC() );
    };
    useEffect( () => {
        requestReviews();
    }, [] );

    let reviewElem = reviews.map( (review) => {
        return <Review key={ review.id } review={ review }/>;
    } );

    const style = {
        maxWidth: "1577px",
        margin: "0 auto",
    };

    const responsive = {
        0: { items: 1 },
        568: { items: 2 },
        1024: { items: 3 },
    };

    return (
        <div style={ style }>
            <h1 className={ styles.rev_head }>Отзывы</h1>
            { error ? (
                <h1>{ error }</h1>
            ) : (
                <div>
                    <AliceCarousel
                        items={ reviewElem }
                        autoPlay="false"
                        autoPlayInterval="2000"
                        animationType="fadeout"
                        disableButtonsControls
                        infinite
                        responsive={ responsive }
                    />
                </div>
            ) }
        </div>
    );
};

export default ReviewsContainer;
