import React from "react";
import Button from "@mui/material/Button";

const SliderButtonsControl = ({ nextSlider, prewSlider, buttonsActive }) => {
    return (
        <div className="btn__wrp">
            <Button
                variant="contained"
                disabled={!buttonsActive.prew}
                onClick={() => {
                    prewSlider();
                }}
            >
                Назад
            </Button>
            <Button
                variant="contained"
                disabled={!buttonsActive.next}
                onClick={() => {
                    nextSlider();
                }}
            >
                Вперёд
            </Button>
            {/* <IconButton
                disabled={!buttonsActive.prew}
                aria-label="prew"
                onClick={() => {
                    prewSlider();
                }}
            >
                <ArrowLeftTwoTone color="primary" />
            </IconButton>
            <IconButton
                disabled={!buttonsActive.next}
                aria-label="next"
                onClick={() => {
                    nextSlider();
                }}
            >
                <ArrowRightTwoTone color="primary" />
            </IconButton> */}
        </div>
    );
};

export default SliderButtonsControl;
