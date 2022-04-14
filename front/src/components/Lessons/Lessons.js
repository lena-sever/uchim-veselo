import * as React from "react";
import { Navigate, NavLink, useParams } from "react-router-dom";
import { useSelector } from "react-redux";
import {
    selectCourses,
    selectCoursesError,
} from "../../store/courses/coursesSelectors";
import {
    selectLessons,
    selectLessonsLoading,
} from "../../store/lessons/lessonsSelectors";
import CircularProgress from "../curcularProgress/CircularProgress";

function Lessons() {
    const { courseId } = useParams();
    const courses = useSelector(selectCourses);
    const lessons = useSelector(selectLessons);
    const isLoading = useSelector(selectLessonsLoading);
    const error = useSelector(selectCoursesError);

    if (!courses[courseId - 1]) {
        return <Navigate replace to="/courses" />;
    }

    return (
        <>
            <h2>{courses[courseId - 1].title} </h2>
            <NavLink to="/courses">Вернуться к списку историй</NavLink>

            <div sx={{ width: "100%", maxWidth: 600 }}>
                {isLoading ? (
                    <CircularProgress />
                ) : error ? (
                    <>{!!error && <h3>{error}</h3>}</>
                ) : (
                    Object.keys(lessons).map((i) => {
                        return (
                            <p key={i}>
                                <NavLink
                                    to={`/courses/${courseId}/${lessons[i].id}`}
                                >
                                    {lessons[i].title}
                                </NavLink>
                            </p>
                        );
                    })
                )}
            </div>
        </>
    );
}

export default Lessons;
