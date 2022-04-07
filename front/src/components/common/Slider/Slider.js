import React from "react";

// import SliderButtonsControl from "./SliderButtonsControl";
import SliderItem from "./SliderItem";
import SliderButton from "./SliderButton";


const SliderContainer = ({ sliderList }) => {
    const [slideItemId, setSliderItemId] = React.useState(0);
    const newAudio = new Audio(sliderList[slideItemId].song);

    React.useEffect(() => {
        newAudio.autoplay = true;
        newAudio.volume = 0.3;
        return () => {
            newAudio.muted = true;
        };
    }, [slideItemId]);

    const togleSlide = (slideId) => {
        if (slideItemId !== slideId) {
            newAudio.muted = true;
            setSliderItemId(slideId);
        }
    };

    const button = sliderList.map((item, index) => {
        return (
            <SliderButton
                key={index}
                numb={index + 1}
                togleSlide={togleSlide}
                active={slideItemId === index}
            />
        );
    });

    // const nextSlider = () => {
    //     if (slideItemId < sliderList.length - 1) {
    //         newAudio.muted = true;
    //         setSliderItemId(slideItemId + 1);
    //     }
    // };
    // const prewSlider = () => {
    //     if (slideItemId > 0) {
    //         newAudio.muted = true;
    //         setSliderItemId(slideItemId - 1);
    //     }
    // };

    return (
        <div>
            <div>{button}</div>
            <SliderItem
                newAudio={newAudio}
                text={sliderList[slideItemId].text}
                title={sliderList[slideItemId].title}
                img={sliderList[slideItemId].img}
            />

            {/* <SliderButtonsControl
                buttonsActive={{
                    next: slideItemId < sliderList.length - 1,
                    prew: slideItemId > 0,
                }}
                nextSlider={nextSlider}
                prewSlider={prewSlider}
            /> */}
        </div>
    );
};

export default React.memo(SliderContainer);
