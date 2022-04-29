import "./Tests.css";
import React from "react";

function TestSliderButton({ opacity, onClick }) {

    const opacityStyle = {
        opacity: opacity
    };

    return (
        <button className="test__btn"
                type="button"
                style={ opacityStyle }
                data-role="none"
                onClick={onClick}
        >
            Далее
        </button>
    );
}


export default TestSliderButton;
