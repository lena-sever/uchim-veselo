import React from "react";
import IconButton from "@mui/material/IconButton";
import Circle from "@mui/icons-material/Circle";

const SliderButton = ({ nextSlider, prewSlider, buttonsActive, numb, togleSlide, active }) => {
    return (
        <>
            <IconButton
                aria-label="togle slider"
                onClick={() => {
                    togleSlide(numb - 1);
                }}
            >
                <Circle color={active ? "secondary" : "primary"} />
            </IconButton>
        </>
    );
};

export default SliderButton;
