import React from "react";
import styles from "./LessonReview.module.css";

const LessonReview = (props) => {
    return (
        <div className={styles.review}>
            <div>
                <img
                    src={props.review.user.photo}
                    className={styles.img_course}
                />
            </div>
            <div>
                <p className={styles.rev_name}>{props.review.user.name}</p>
                <p className={styles.rev_text}>{props.review.text}</p>
            </div>
        </div>
    );
};

export default LessonReview;
