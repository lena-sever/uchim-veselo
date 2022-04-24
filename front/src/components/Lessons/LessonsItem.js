import { Navigate, NavLink, useParams } from "react-router-dom";
import * as React from "react";
import { selectLessons } from "../../store/lessons/lessonsSelectors";
import { useDispatch, useSelector } from "react-redux";
import { getFirstTest } from "../../store/tests/actions";

function LessonsItem() {
    const { courseId } = useParams();
    const { lessonId } = useParams();
    const lessons = useSelector( selectLessons );
    const dispatch = useDispatch();


    let lesson = lessons.find( less => {
        // debugger
        return less.id == lessonId;
    } );

    if( !lessonId ) {
        return <Navigate replace to={ `/courses/${ courseId }` }/>;
    }

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
                ( lessonId == 2 ) ?
                    <p>
                        <NavLink to={ `/courses/${ courseId }/2/tests` }
                        >
                            Пройти тест
                        </NavLink>
                    </p>
                    : null
            }

        </>
    );
}

export default LessonsItem;
