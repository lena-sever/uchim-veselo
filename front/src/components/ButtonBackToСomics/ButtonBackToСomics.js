import "./ButtonBackToСomics.css";
import { NavLink } from "react-router-dom";
import styles from "../Lessons/LessonReview/LessonReview.module.css";
import Button from "@mui/material/Button";
import * as React from "react";

function ButtonBackToComics({ path, text, className }) {
    return (
        <Button
            as={ NavLink }
            // className={ styles.btn_link }
            // className={ className }
            className="btn__comics"
            variant="contained"
            color="secondary"
            to={ path }
        >
            { text }
        </Button>
    );
}

export default ButtonBackToComics;
