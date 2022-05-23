import React, { useEffect } from "react";

import SliderButtonsControl from "./SliderButtonsControl";
import SliderItem from "./SliderItem";
import SliderButton from "./SliderButton";
import { useParams } from "react-router-dom";
import { getCourseId } from "../../../store/courseId/actions";
import { useDispatch } from "react-redux";

const SliderContainer = ({ sliderList, togleTestActive }) => {
    const { courseId } = useParams();
    const dispatch = useDispatch();
    const [ slideItemId, setSliderItemId ] = React.useState( 0 );
    const newAudio = new Audio( sliderList[ slideItemId ].music );

    useEffect( () => {
        dispatch( getCourseId( courseId ) );
    }, [] );
    React.useEffect( () => {
        newAudio.autoplay = false;
        if(slideItemId !== 0) {
            newAudio.autoplay = true;
        }       
        newAudio.volume = 0.3;
        return () => {
            newAudio.muted = true;
        };
    }, [ slideItemId ] );



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

    const nextSlider = () => {
        if (slideItemId < sliderList.length) {
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

    return (
        <div className="slider">
            {/* <div>{button}</div> */}

            <SliderItem
                slideItemId={slideItemId + 1}
                sliderCoast={sliderList.length + 1}
                newAudio={newAudio}
                text={sliderList[slideItemId].text}
                // title={sliderList[slideItemId].title}
                img={sliderList[slideItemId].img}
                isLastSlider={slideItemId === sliderList.length - 1}
                path={sliderList[slideItemId].path}
                togleTestActive={togleTestActive}
            />
            <SliderButtonsControl
                buttonsActive={{
                    next: slideItemId < sliderList.length - 1,
                    prew: slideItemId > 0,
                }}
                nextSlider={nextSlider}
                prewSlider={prewSlider}
            />

        </div>
    );
};

export default React.memo(SliderContainer);
