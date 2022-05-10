import "./TestButton.css";
import * as React from "react";

function TestButton({ getTestsHandler, num }) {
    return (
        <button className="test__btn"
                onClick={ () => {
                    getTestsHandler( num );
                } }
        >Далее
        </button>
    );
}

export default TestButton;
