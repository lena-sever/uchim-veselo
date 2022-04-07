import React from "react";

const SliderButton = ({ nextSlider, prewSlider, buttonsActive, numb, togleSlide }) => {
    return (
        <>
            <button
            // disabled={!buttonsActive.next}
            onClick={() => {
                togleSlide(numb - 1);
            }}
            >
                {numb}
            </button>
        </>
    );
};

export default SliderButton;
