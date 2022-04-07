import React from "react";
import styles from "./Reviews.module.css";

const Review = (props) => {
    return (
        <>
            <div className={styles.review}>
                <div>
                    <img src={props.course.img} className={styles.img_course} />
                </div>
                <div>
                    <h3 className={styles.rev_head_item}>{props.course.title}</h3>
                    <p className={styles.rev_name}>{props.user.name}</p>
                    <p className={styles.rev_text}>{props.text}</p>
                </div>
            </div>
        </>
    );
};

export default Review;
