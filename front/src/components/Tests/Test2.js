import { NavLink } from "react-router-dom";
import test from "../../constants/test.json";

function Test2() {

    return (
        <>
            <p>Прочитайте значение слова:</p>
            <p>{ test.word } - { test.answer_5 }</p>
            <p>Прочитайте происхождение слова: </p>
            <p>{ test.source_word }</p>

            <p><NavLink to="/test3">Далее </NavLink></p>
        </>
    );
}

export default Test2;
