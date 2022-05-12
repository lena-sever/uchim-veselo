import "../Tests.css";
import "./Test5.css";
import * as React from "react";
import { useEffect, useState } from "react";
import { NavLink } from "react-router-dom";
import TestTitle from "../TestTitle/TestTitle";
import TestsImg from "../TestsImg/TestsImg";
import Button from "@mui/material/Button";
import styles from "../../Lessons/LessonReview/LessonReview.module.css";

function Test5({ path, firstTest, secondTest }) {
    const [ textAreaValue, setTextAreaValue ] = useState( "" );
    const [ isWritten, setWritten ] = useState( false );

    const getValueHandler = (e) => {
        setTextAreaValue( e.target.value );
    };

    useEffect( () => {
        if( textAreaValue.toLowerCase() == firstTest.word.toLowerCase() ) {
            setWritten( true );
        }
        setTextAreaValue( "" );
    }, [ textAreaValue ] );

    return (
        <>
            <TestsImg src={ secondTest.img }/>
            <TestTitle title="Прочитайте происхождение слова " word={ firstTest.word }/>
            <p className="test__text ">{ secondTest.etymology }</p>

            <TestTitle title="Напишите слово " word={ firstTest.word }/>
            <textarea
                onChange={ getValueHandler }
                className="test__area"
                placeholder={ firstTest.word }
            >
                { textAreaValue }
            </textarea>

            {
                isWritten &&
                <div><p className="test__correct center">Молодец! Ты успешно ответил на все вопросы и очень помог нашему
                    герою!</p>
                    <Button
                        as={ NavLink }
                        className={ styles.btn_link }
                        variant="contained"
                        color="secondary"
                        to={ path }
                    >
                        Вернуться к комиксу
                    </Button>
                </div>
            }

        </>
    );
}

export default Test5;