import * as React from "react";
import { Navigate, NavLink, useParams } from "react-router-dom";
import { useSelector, useDispatch } from "react-redux";
import {
    selectCourses,
    selectCoursesError,
} from "../../store/courses/coursesSelectors";
import {
    selectLessons,
    selectLessonsLoading,
} from "../../store/lessons/lessonsSelectors";
import CircularProgress from "../curcularProgress/CircularProgress";
import { selectReview, selectError } from "../../store/reviews/reviewsSelector";
import { useEffect } from "react";
import { getReviewTC } from "../../store/reviews/actions";
import { getCourses } from "../../store/courses/actions";
import { getLessons } from "../../store/lessons/actions";
import LessonReview from "./LessonReview/LessonReview";

function Lessons() {
    const { courseId } = useParams();
    const courses = useSelector(selectCourses);
    const lessons = useSelector(selectLessons);
    const isLoading = useSelector(selectLessonsLoading);
    const error = useSelector(selectCoursesError);

    const requestCourses = async () => {
        dispatch(getCourses());
        dispatch(getLessons(courseId));
    };

    const reviewCourse = useSelector(selectReview);
    // const error_review = useSelector(selectError);
    const dispatch = useDispatch();
    const requestReview = async (courseId) => {
        dispatch(getReviewTC(courseId));
    };
    useEffect(() => {
        if (courses.length === 0) {
            console.log(courseId);
            requestCourses();
            console.log(lessons);
        }
        requestReview(courseId);
    }, []);

    let reviewElem = reviewCourse.map((review) => {
        return <LessonReview key={review.id} review={review} />;
    });

    const style = {
        maxWidth: "1249px",
        margin: "0 auto",
    };
    if (courses.length !== 0) {
        console.log(lessons);
        return (
            <>
                <h2>{courses[courseId - 1].title} </h2>
                <NavLink to="/courses">Вернуться к списку комиксов</NavLink>
                <NavLink to={`/courses/${courseId}/:slider1`}>
                    Начать комикс
                </NavLink>

                {/* <div sx={{ width: "100%", maxWidth: 600 }}>
                    {isLoading ? (
                        <CircularProgress />
                    ) : error ? (
                        <>{!!error && <h3>{error}</h3>}</>
                    ) : (
                        Object.keys(lessons).map((i) => {
                            return (
                                <p key={i}>
                                    <NavLink
                                        to={`/courses/${courseId}/${lessons[i].id}/:slider1`}
                                    >
                                        {lessons[i].title}
                                    </NavLink>
                                </p>
                            );
                        })
                    )}
                </div> */}
                <div>
                    <h2>Отзывы</h2>
                </div>
                <div style={style}>{reviewElem}</div>
            </>
        );
    }
    return <CircularProgress />;
}

export default Lessons;
