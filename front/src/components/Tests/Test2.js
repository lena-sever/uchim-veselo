import { NavLink } from "react-router-dom";
import test from "../../constants/test.json";
import * as React from "react";

function Test2({ test, getTestsHandler }) {

    return (
        <>
            <p>Прочитайте значение слова:</p>
            <p>{ test.word } - { test.answer_5 }</p>
            {/*<p>Прочитайте происхождение слова: </p>*/ }
            {/*<p>{ test.source_word }</p>*/ }

            {/*<p><NavLink to="/test3">Далее </NavLink></p>*/ }
            <button
                onClick={ getTestsHandler(3) }
            >Далее
            </button>
        </>
    );
}

export default Test2;
