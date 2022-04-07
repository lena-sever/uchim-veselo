import React from "react";
import IconButton from "@mui/material/IconButton";
import PauseCircleFilledSharp from "@mui/icons-material/PauseCircleFilledSharp";
import PlayCircleFilledOutlined from "@mui/icons-material/PlayCircleFilledOutlined";
import VolumeMuteSharp from "@mui/icons-material/VolumeMuteSharp";
import VolumeUpSharp from "@mui/icons-material/VolumeUpSharp";

const SliderItem = ({ text, newAudio }) => {
    const [mute, setMute] = React.useState(0.0);

    React.useEffect(() => {
        newAudio.autoplay = true;
    }, []);

    const togleSound = () => {
        newAudio.volume = mute;
    };

    return (
        <>
            <div>{text}</div>
            <div>{text}</div>
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
                    if (mute) {
                        setMute(0);
                        togleSound();
                    } else {
                        setMute(1);
                        togleSound();
                    }
                }}
            >
                {mute ? (
                    <VolumeUpSharp color="primary" />
                ) : (
                    <VolumeMuteSharp color="primary" />
                )}
            </IconButton>
        </>
    );
};

export default SliderItem;
