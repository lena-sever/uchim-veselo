import "./TestTitle.css";
import * as React from "react";

function TestTitle({ title, word }) {

    return (
        <>
            <h2>
                <span className="test__title">{ title } </span>
                <span className="test__word">{ word }</span>
            </h2>
        </>
    );
}

export default TestTitle;
