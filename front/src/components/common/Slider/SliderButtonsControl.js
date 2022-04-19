import React from 'react';
import PreviewSharp from "@mui/icons-material/PreviewSharp";

const SliderButtonsControl = ({ nextSlider, prewSlider, buttonsActive }) => {
    return (
        <div>
            <button
                disabled={!buttonsActive.next}
                onClick={() => {
                    nextSlider();
                }}
            >
                next
            </button>
            <button
                disabled={!buttonsActive.prew}
                onClick={() => {
                    prewSlider();
                }}
            >
                <PreviewSharp color="primary" />
            </button>
        </div>
    );
};

export default SliderButtonsControl;
