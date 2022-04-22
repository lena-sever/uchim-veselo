import { Navigate, NavLink, useParams } from "react-router-dom";
import * as React from "react";
import Button from "@mui/material/Button";
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
import styles from "./LessonReview/LessonReview.module.css";

function LessonsItem() {
    const {slider1} = useParams();
    console.log(slider1)
    const { courseId, lessonId } = useParams();
    const dispatch = useDispatch();
    const lessons = useSelector(selectLessons);
    const firstHistoy = useSelector(selectFirstHistory);
    const lastHistoy = useSelector(selectLastHistory);
    const err = useSelector(selectErr);

    const requestCourses = async () => {
        dispatch(getLessons(courseId));
    };

    const requestHistory = async () => {
        dispatch(getFirstHistory(courseId));
        
    };

    let lesson = lessons.find((less) => {
        return less.id == lessonId;
    });


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
                            path={""}
                        />
                    }
                </div>
                <Button as={NavLink} className={styles.btn_link} variant="contained" color="secondary" to="/courses">
                    Назад к историям
                </Button>
            </>
        );
    }
    return <>!</>;
}

export default LessonsItem;
