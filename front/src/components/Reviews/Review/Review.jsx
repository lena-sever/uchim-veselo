import React from "react";
import styles from "./Review.module.css";

const Review = (props) => {
    return (
        <div className={styles.review}>
            <div>
                <img src={props.review.img} className={styles.img_course} />
            </div>
            <div>
                <p className={styles.rev_name}>{props.review.user_name}</p>
                <p className={styles.rev_text}>{props.review.text}</p>
            </div>
        </div>
    );
};

export default Review;
