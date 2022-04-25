import * as React from "react";
import { useState } from "react";

function Answer({answer}) {
    const [ display, setDisplay ] = useState( "none" );
    const style = {
        display: display
    };

    const showAnswerHandler = () => {
        if( display === "none" ) {
            setDisplay( "block" );
        } else {
            setDisplay( "none" );
        }
    };

    return (
        <>
            <p onClick={ showAnswerHandler }>Посмотреть правильный ответ</p>
            <div style={ style }>
                <p>{answer}</p>
            </div>
        </>
    );
}

export default Answer;
