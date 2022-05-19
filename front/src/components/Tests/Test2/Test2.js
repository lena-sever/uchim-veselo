import "../Tests.css"
import * as React from "react";
import TestTitle from "../TestTitle/TestTitle";
import TestButton from "../TestButton/TestButton";
import TestsImg from "../TestsImg/TestsImg";
import ButtonBackToComics from "../../ButtonBackToСomics/ButtonBackToСomics";

function Test2({ firstTest, getTestsHandler }) {
    const path = "/courses";

    return (
        <>
            <TestsImg src={ firstTest.src }/>
            <TestTitle title="Прочитайте значение слова" word={ firstTest.word }/>
            <p className="test__text">
                <span className="test__word">{ firstTest.word }</span> - { firstTest.answer_5 }
            </p>
            <div className="test__bottom">
                <TestButton getTestsHandler={ getTestsHandler } num={ 3 }/>
                <ButtonBackToComics path={path} text="Назад к комиксам"/>
            </div>

        </>
    );
}

export default Test2;
