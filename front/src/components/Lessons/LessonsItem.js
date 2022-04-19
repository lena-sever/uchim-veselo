import { Navigate, NavLink, useParams } from "react-router-dom";
import * as React from "react";
import { selectLessons } from "../../store/lessons/lessonsSelectors";
import { useSelector } from "react-redux";

function LessonsItem() {
    const { courseId } = useParams();
    const { lessonId } = useParams();
    const lessons = useSelector( selectLessons );

    let lesson = lessons.find(less => {
        // debugger
        return less.id == lessonId})

    // if( !lesson.lessonId ) {
    //     return <Navigate replace to={`/courses/${ courseId }`}/>;
    // }

    return (
        <>
            <NavLink to={ `/courses/${ courseId }` }>
                Вернуться к списку уроков
            </NavLink>
            <div>
                <h3>{ lesson.title }</h3>
                <p>{ lesson.text }</p>
            </div>
            {
                ( lessonId == lessons.length ) ?
                    <p><NavLink to="/tests">Пройти тест</NavLink></p>
                    : null
            }

        </>
    );
}

export default LessonsItem;
