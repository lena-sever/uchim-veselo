import React from "react";
import { useDispatch, useSelector } from "react-redux";
import { useParams } from "react-router-dom";
import { Button } from "@mui/material";

import { NavLink } from "react-router-dom";
import { makeStyles } from "@material-ui/core/styles";
import { styled } from "@mui/material/styles";

import { selectReview, selectError } from "../../store/reviews/reviewsSelector";
import { purple, common } from "@mui/material/colors";
import { getCours, getCourses } from "../../store/courses/actions";
import {
    selectCours,
    selectCourses,
} from "../../store/courses/coursesSelectors";
import { getReviewTC } from "../../store/reviews/actions";
import LessonReview from "../Lessons/LessonReview/LessonReview";
import "./Cours.css";

import ReviewForm from "../Lessons/ReviewForm/ReviewForm";

const useStyles = makeStyles((theme) => ({
    btn: {
        margin: theme.spacing(2),
        textDecoration: "none",
        textTransform: "uppercase",
        borderRadius: "5px",
        padding: "10px 20px",
        border: "1px solid #b458bf",
    },
}));

const ColorButton = styled(Button)(({ theme }) => ({
    color: theme.palette.getContrastText(purple[500]),
    backgroundColor: purple[500],
    "&:hover": {
        backgroundColor: purple[700],
    },
}));

const ColorButtonOutlined = styled(Button)(({ theme }) => ({
    color: purple[500],
    backgroundColor: common.white,
    "&:hover": {
        color: theme.palette.getContrastText(purple[100]),
        backgroundColor: purple[100],
    },
}));

const CoursPage = () => {
    const classes = useStyles();
    const dispatch = useDispatch();
    const courses = useSelector(selectCourses);
    const requestCours = async (courseId) => {
        await dispatch(getCourses());
        await dispatch(getCours(courseId));
    };
    const cours = useSelector(selectCours);
    const reviewCourse = useSelector(selectReview);
    let { courseId } = useParams();
    const requestReview = async (courseId) => {
        dispatch(getReviewTC(courseId));
    };
    React.useEffect(() => {
        console.log(courseId);
        requestCours(courseId);
        requestReview(courseId);
    }, []);

    let reviewElem = reviewCourse.map((review) => {
        return <LessonReview key={review.id} review={review} />;
    });
    const style = {
        maxWidth: "1249px",
        margin: "0 auto",
    };

    return courses.length > parseInt(courseId - 1) ? (
        <div className="cours__wrp">
            {cours && (
                <>
                    <h1 className="title">{cours.title}</h1>
                    <img className="cours__img" src={cours.img} />
                    <h2 className="subtitle">{cours.description}</h2>
                    <p className="text_box_main cours__text">{cours.text}</p>
                    <div className="cours__btn-wrp">
                        <ColorButton
                            as={NavLink}
                            to={`/courses/${courseId}/slider1`}
                            size="large"
                            className={classes.btn}
                        >
                            Начать историю
                        </ColorButton>

                        <ColorButtonOutlined
                            as={NavLink}
                            className={classes.btn}
                            to="/courses"
                            size="large"
                        >
                            Другие истории
                        </ColorButtonOutlined>
                    </div>
                    <div>
                        <ReviewForm courseId={courseId}></ReviewForm>
                        <h2>Отзывы</h2>
                    </div>
                    <div style={style}>{reviewElem}</div>
                </>
            )}
        </div>
    ) : (
        <ColorButtonOutlined
            as={NavLink}
            className={classes.btn}
            to="/courses"
            size="large"
        >
            Другие истории
        </ColorButtonOutlined>
    );
};

export default CoursPage;
