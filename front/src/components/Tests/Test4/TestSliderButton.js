import "../Tests.css";
import React from "react";

function TestSliderButton({ handleClick, onClick }) {

    // const opacityStyle = {
    //     opacity: opacity
    // };


    return (
        <button className="test__btn"
                type="button"
            // style={ opacityStyle }
                data-role="none"
                onClick={ (e) => {
                    onClick( e );
                    handleClick();
                } }
        >
            Далее
        </button>
    );
}

export default TestSliderButton;
