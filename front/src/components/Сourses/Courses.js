import { useDispatch, useSelector } from "react-redux";
import { getCourses } from "../../store/courses/actions";
import { useEffect } from "react";

import {
    selectCourses,
    selectCoursesError,
    selectCoursesLoading,
} from "../../store/courses/coursesSelectors";
import CoursesItem from "./CoursesItem";
import "./Courses.css";
import CircularProgress from "../curcularProgress/CircularProgress";

function Courses() {
    const dispatch = useDispatch();
    const courses = useSelector(selectCourses);
    const isLoading = useSelector(selectCoursesLoading);
    const error = useSelector(selectCoursesError);

    const requestCourses = async () => {
        dispatch(getCourses());
    };

    useEffect(() => {
         requestCourses();
    }, []);

    return (
        <>
            <h1 className="head">Выберите комикс:</h1>
            <section className="products">
                {isLoading ? (
                    <CircularProgress />
                ) : error ? (
                    <>{!!error && <h3>{error}</h3>}</>
                ) : (
                    <>
                        {Object.keys(courses).map((i) => (
                            <CoursesItem key={i} course={courses[i]} />
                        ))}
                    </>
                )}
            </section>
        </>
    );
}

export default Courses;
