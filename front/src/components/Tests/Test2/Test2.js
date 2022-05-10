import "../Tests.css"
import * as React from "react";
import TestTitle from "../TestTitle/TestTitle";
import TestButton from "../TestButton/TestButton";
import TestsImg from "../TestsImg/TestsImg";

function Test2({ firstTest, getTestsHandler }) {

    return (
        <>
            <TestsImg src={ firstTest.src }/>
            <TestTitle title="Прочитайте значение слова" word={ firstTest.word }/>
            <p className="test__text">
                <span className="test__word">{ firstTest.word }</span> - { firstTest.answer_5 }
            </p>
            <div className="test__bottom">
                <TestButton getTestsHandler={ getTestsHandler } num={ 3 }/>
            </div>
        </>
    );
}

export default Test2;
