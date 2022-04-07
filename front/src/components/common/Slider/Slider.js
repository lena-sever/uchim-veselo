import React from "react";
import Slider from "react-slick";

import "slick-carousel/slick/slick.css";
import "slick-carousel/slick/slick-theme.css";

import song1 from "./1.mp3";
import song2 from "./2.mp3";
import song3 from "./3.mp3";
import song4 from "./4.mp3";
import song5 from "./5.mp3";
import song6 from "./6.mp3";

import SliderButtonsControl from "./SliderButtonsControl";
import SliderItem from "./SliderItem";
import SliderButton from "./SliderButton";

const sliderList = [
    { text: "1" },
    { text: "2" },
    { text: "3" },
    { text: "4" },
    { text: "5" },
    { text: "6" },
];

const treckList = [song1, song2, song3, song4, song5, song6];

const SliderContainer = () => {
    const [slideItemId, setSliderItemId] = React.useState(0);
    const newAudio = new Audio(treckList[slideItemId]);

    React.useEffect(() => {
        newAudio.autoplay = true;
        return () => {
            newAudio.muted = true;
        };
    }, [newAudio]);

    const nextSlider = () => {
        if (slideItemId < sliderList.length - 1) {
            newAudio.muted = true;
            setSliderItemId(slideItemId + 1);
        }
    };
    const prewSlider = () => {
        if (slideItemId > 0) {
            newAudio.muted = true;
            setSliderItemId(slideItemId - 1);
        }
    };

    const togleSlide = (slideId) => {
        newAudio.muted = true;
        setSliderItemId(slideId);
    };

    const button = sliderList.map((item, index) => {
        return (
            <SliderButton
                key={index}
                numb={index + 1}
                togleSlide={togleSlide}
            />
        );
    });

    return (
        <div>
            <SliderItem
                newAudio={newAudio}
                text={sliderList[slideItemId].text}
                song={treckList[slideItemId]}
            />

            {/* <SliderButtonsControl
                buttonsActive={{
                    next: slideItemId < sliderList.length - 1,
                    prew: slideItemId > 0,
                }}
                nextSlider={nextSlider}
                prewSlider={prewSlider}
            /> */}
            {button}
        </div>
    );
};

export default SliderContainer;
