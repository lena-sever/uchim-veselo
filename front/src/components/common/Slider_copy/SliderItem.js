import React from "react";
import { NavLink } from "react-router-dom";
import Button from "@mui/material/Button";
import IconButton from "@mui/material/IconButton";
import PauseCircleFilledSharp from "@mui/icons-material/PauseCircleFilledSharp";
import PlayCircleFilledOutlined from "@mui/icons-material/PlayCircleFilledOutlined";
import Slider from "@mui/material/Slider";
import VolumeMuteSharp from "@mui/icons-material/VolumeMuteSharp";
import VolumeUpSharp from "@mui/icons-material/VolumeUpSharp";

import "./Slider.css";

const SliderItem = ({ text, newAudio, slideItemId, sliderCoast, img, isLastSlider, path }) => {
    console.log(path);
    const [mute, setMute] = React.useState(0.3);
    console.log(isLastSlider);
    React.useEffect(() => {
        if(slideItemId !== 0) {          
            newAudio.autoplay = true;
        }
    }, []);

    const togleSound = (mute) => {
        newAudio.volume = mute;
    };

    const handleChange = (event, newValue) => {
        setMute(newValue);
        togleSound(newValue);
    };

    return (
        <>
            {/* <h2>{title}</h2> */}
            {isLastSlider ? (
                <div className="btn_link">
                    <Button
                        as={NavLink}
                        variant="contained"
                        color="success"
                        to={path}
                    >
                        {text}
                    </Button>
                </div>
            ) : (
                <>
                    <div>
                        <IconButton
                            aria-label="play"
                            onClick={() => {
                                newAudio.play();
                            }}
                        >
                            <PlayCircleFilledOutlined color="primary" />
                        </IconButton>
                        <IconButton
                            aria-label="pause"
                            onClick={() => {
                                newAudio.pause();
                            }}
                        >
                            <PauseCircleFilledSharp color="primary" />
                        </IconButton>
                        <IconButton
                            aria-label="sound off/on"
                            onClick={() => {
                                if (!mute) {
                                    setMute(1);
                                    togleSound(1);
                                } else {
                                    setMute(0);
                                    togleSound(0);
                                }
                            }}
                        >
                            {mute ? (
                                <VolumeUpSharp color="primary" />
                            ) : (
                                <VolumeMuteSharp color="primary" />
                            )}
                        </IconButton>
                        <Slider
                            sx={{ width: 100, padding: "3px" }}
                            aria-label="Volume"
                            value={mute}
                            onChange={handleChange}
                            step={0.1}
                            min={0}
                            max={1}
                        />
                    </div>
                    <img className="slider__img" src={img} />
                    <div className="slider__text">{text}</div>
                    <div className="slider__count">{slideItemId}/{sliderCoast}</div>
                </>
            )}
        </>
    );
};

export default SliderItem;
