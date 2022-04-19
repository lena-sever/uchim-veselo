import * as React from "react";
import Radio from "@mui/material/Radio";
import RadioGroup from "@mui/material/RadioGroup";
import FormControlLabel from "@mui/material/FormControlLabel";
import FormControl from "@mui/material/FormControl";
import FormLabel from "@mui/material/FormLabel";
import { NavLink } from "react-router-dom";
import { useEffect, useState } from "react";



function Test2() {

    return (
        <>
            <p>Прочитайте значение слова:</p>
            <p>{}</p>



            <p><NavLink to="/test3">Далее </NavLink></p>
        </>
    );
}

export default Test2;
