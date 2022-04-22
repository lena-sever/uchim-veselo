import { Navigate, NavLink, useParams } from "react-router-dom";
import * as React from "react";
import Button from '@mui/material/Button';
import { selectLessons } from "../../store/lessons/lessonsSelectors";
import {
    selectFirstHistory,
    selectLastHistory,
    selectErr,
} from "../../store/history/historySelector";
import { useSelector, useDispatch } from "react-redux";

import { getLessons } from "../../store/lessons/actions";
import { getFirstHistory } from "../../store/history/historyReducer";

import SliderContainer from "../common/Slider/Slider";

function LessonsItem() {
    const { courseId, lessonId } = useParams();
    const dispatch = useDispatch();
    const lessons = useSelector(selectLessons);
    const firstHistoy = useSelector(selectFirstHistory);
    const lastHistoy = useSelector(selectLastHistory);
    const err = useSelector(selectErr);

    const [isTestComplete, setIsTestComplite] = React.useState(false);
    const [isTestActive, setIsTestActive] = React.useState(false);

    const requestCourses = async () => {
        dispatch(getLessons(courseId));
    };

    const requestHistory = async () => {
        dispatch(getFirstHistory(courseId));
    };

    let lesson = lessons.find((less) => {
        return less.id == lessonId;
    });

    const togleTest = () => {
        setIsTestComplite(true);
    };

    const togleTestActive = () => {
        setIsTestActive(true);
    };

    React.useEffect(() => {
        requestHistory();
        if (!lesson) {
            requestCourses();
            console.log(lessons);
        }
    }, []);

    if (lessons) {
        return (
            <>
                
                <div>
                    {
                        <SliderContainer
                            sliderList={[
                                ...firstHistoy,
                                { music: "", text: "Начать тест", img: "" },
                            ]}
                            togleTestActive={togleTestActive}
                        />
                    }
                    {isTestActive&&<p>w</p>}
                    {/* <h3>{lesson.title}</h3>
                    <p>{lesson.text}</p>
                    <p>{lessonId}</p>
                    <p>{courseId}</p> */}
                </div>
            </>
        );
    }
    return <>!</>;
}

export default LessonsItem;
