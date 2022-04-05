import React from "react";
import styles from "./Reviews.module.css";

const Review = (props) => {
    debugger;
    return (
        <>
            <div className={styles.review}>
                <div>
                    <img src={props.course.img} className={styles.img_course} />
                </div>
                <div>
                    <h3>{props.course.title}</h3>
                    <p>{props.user.name}</p>
                    <p>{props.text}</p>
                </div>
            </div>
        </>
    );
};

export default Review;
