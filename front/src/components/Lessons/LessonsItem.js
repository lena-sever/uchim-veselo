import { NavLink, useLocation, useParams } from "react-router-dom";
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
import { getPath } from "../../store/courseId/actions";
import { useEffect } from "react";
import ButtonBackToComics from "../ButtonBackToСomics/ButtonBackToСomics";

function LessonsItem() {


    const { slider1 } = useParams();
    console.log( slider1 );
    const { courseId } = useParams();
    const dispatch = useDispatch();
    const firstHistoy = useSelector( selectFirstHistory );
    const lastHistoy = useSelector( selectLastHistory );
    const err = useSelector( selectErr );
    const path = "/courses";
    console.log( err );


    const requestHistory = async() => {
        dispatch( getFirstHistory( courseId ) );
        dispatch( getLastHistory( courseId ) );
    };

    React.useEffect( () => {
        requestHistory();

    }, [] );

    // useEffect( () => {
    //     dispatch( getPath( slider1 ) );
    // }, [ slider1 ] );


    if( !err ) {
        return (
            <div className="slider-wrap">
                <div>
                    { slider1 === "slider1" && (
                        <SliderContainer
                            sliderList={ [
                                ...firstHistoy,
                                {
                                    music: "",
                                    text: "Начать тест",
                                    img: "",
                                    path: `/courses/${ courseId }/tests`,
                                },
                            ] }
                        />
                    ) }
                    { slider1 === "slider2" && (
                        <SliderContainer
                            sliderList={ [
                                {
                                    music: "",
                                    text: "Часть 2",
                                    img: "",
                                },
                                ...lastHistoy,
                                {
                                    music: "",
                                    text: "К следующему комиксу",
                                    img: "",
                                    path: `/courses/${ courseId * 1 + 1 }`,
                                },
                            ] }
                        />
                    ) }
                </div>
                <ButtonBackToComics path={path} text="Назад к комиксам" className={styles.btn_link}/>
                {/*<Button*/ }
                {/*    as={ NavLink }*/ }
                {/*    className={ styles.btn_link }*/ }
                {/*    variant="contained"*/ }
                {/*    color="secondary"*/ }
                {/*    to="/courses"*/ }
                {/*>*/ }
                {/*    Назад к комиксам*/ }
                {/*</Button>*/ }
            </div>
        );
    } else <>err</>;
}

export default LessonsItem;
