import { NavLink, useParams } from "react-router-dom";
import * as React from "react";
import Button from "@mui/material/Button";

import {
    selectFirstHistory,
    selectLastHistory,
    selectErr,
} from "../../store/history/historySelector";
import { useSelector, useDispatch } from "react-redux";

import {
    getFirstHistory,
    getLastHistory,
} from "../../store/history/historyReducer";

import SliderContainer from "../common/Slider/Slider";
import styles from "./LessonReview/LessonReview.module.css";

function LessonsItem() {
    const { slider1 } = useParams();
    console.log(slider1);
    const { courseId } = useParams();
    const dispatch = useDispatch();
    const firstHistoy = useSelector(selectFirstHistory);
    const lastHistoy = useSelector(selectLastHistory);
    const err = useSelector(selectErr);
    console.log(err);
    const requestHistory = async () => {
        dispatch(getFirstHistory(courseId));
        dispatch(getLastHistory(courseId));
    };

    React.useEffect(() => {
        requestHistory();
    }, []);
    if (!err) {
        return (
            <>
                <div>
                    {slider1 === "slider1" && (
                        <SliderContainer
                            sliderList={[
                                ...firstHistoy,
                                {
                                    music: "",
                                    text: "Начать тест",
                                    img: "",
                                    path: `/courses/${courseId}/tests`,
                                },
                            ]}
                        />
                    )}
                    {slider1 === "slider2" && (
                        <SliderContainer
                            sliderList={[
                                {
                                    music: "",
                                    text: "Часть 2",
                                    img: "",
                                },
                                ...lastHistoy,
                                {
                                    music: "",
                                    text: "К следуещей истории",
                                    img: "",
                                    path: `/courses/${courseId * 1 + 1}`,
                                },
                            ]}
                        />
                    )}
                </div>
                <Button
                    as={NavLink}
                    className={styles.btn_link}
                    variant="contained"
                    color="secondary"
                    to="/courses"
                >
                    Назад к историям
                </Button>
            </>
        );
    } else <>err</>;
}
export default LessonsItem;
