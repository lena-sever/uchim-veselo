import { NavLink } from "react-router-dom";
import * as React from "react";
import { selectTests } from "../../store/tests/testsSelector";
import { useSelector } from "react-redux";


function Test3() {
    const test = useSelector( selectTests )[ 0 ];
    return (
        <>
            <h4>Объясните, что такое { test.word }, правильно выбирая слова из скобок: </h4>
            <p><NavLink to="/test4">Далее </NavLink></p>
        </>
    );
}

export default Test3;
