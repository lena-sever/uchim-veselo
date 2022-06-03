import "./ButtonBackToСomics.css";
import { NavLink } from "react-router-dom";
import styles from "../Lessons/LessonReview/LessonReview.module.css";
import Button from "@mui/material/Button";
import * as React from "react";

function ButtonBackToComics({ path, text, color}) {
    return (
        <Button
            as={ NavLink }
            className="btn__comics"
            variant="contained"
            color={color}
            to={ path }
        >
            { text }
        </Button>
    );
}

export default ButtonBackToComics;
