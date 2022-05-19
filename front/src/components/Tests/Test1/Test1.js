import "../Tests.css";
import "./Test1.css";
import * as React from "react";
import { useState } from "react";
import { NavLink } from "react-router-dom";
import TestButton from "../TestButton/TestButton";
import RadioButtons from "./RadioButtons";
import TestTitle from "../TestTitle/TestTitle";
import styles from "../../Lessons/LessonReview/LessonReview.module.css";
import Button from "@mui/material/Button";
import ButtonBackToComics from "../../ButtonBackToСomics/ButtonBackToСomics";

function Test1({ path, firstTest, getTestsHandler }) {
    const [ value, setValue ] = useState( "" );
    const [ disabled, setDisabled ] = useState( false );

    function changeValue(event) {
        setValue( event.target.value );
        setDisabled( true );
    }

    return (
        <>
            <TestTitle title="Помогите герою, выберите правильное значение слова" word={ firstTest.word }/>
            <RadioButtons firstTest={ firstTest } changeValue={ changeValue } disabled={ disabled }/>

            {
                value == firstTest.right_answer ? (
                    <div className="test__correct">
                        <p>
                            Молодец! Ты выбрал правильное решение и помог нашему герою.
                        </p>
                        <p>Спасибо за помощь!</p>

                        <ButtonBackToComics path={path} text="Назад к комиксам"/>
                        {/*<Button*/}
                        {/*    as={ NavLink }*/}
                        {/*    className={ styles.btn_link }*/}
                        {/*    variant="contained"*/}
                        {/*    color="secondary"*/}
                        {/*    to={ path }*/}
                        {/*>*/}
                        {/*    Назад к комиксам*/}
                        {/*</Button>*/}
                    </div>
                ) : ( value != firstTest.right_answer && value != "" ) ? (
                    <div className="test__bottom">
                        <p className="test__error">
                            К сожалению, это неверный выбор.
                        </p>
                        <p className="test__error">Давай вместе разберем значение этого слова.</p>
                        <TestButton getTestsHandler={ getTestsHandler } num={ 2 }/>
                    </div>
                ) : null
            }
        </>
    );
}

export default Test1;
