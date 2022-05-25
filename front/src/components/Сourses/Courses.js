import { useDispatch, useSelector } from "react-redux";
import { getCourses } from "../../store/courses/actions";
import React, { useEffect } from "react";

import {
    selectCourses,
    selectCoursesError,
    selectCoursesLoading,
    // selectCoursesLike,
} from "../../store/courses/coursesSelectors";
import CoursesItem from "./CoursesItem";
import "./Courses.css";
import CircularProgress from "../curcularProgress/CircularProgress";
import Footer from "../Footer/Footer";
import Header from "../Header/Header";

// import FormControlLabel from "@mui/material/FormControlLabel";
// import Checkbox from "@mui/material/Checkbox";

import Box from "@mui/material/Box";
import InputLabel from "@mui/material/InputLabel";
import MenuItem from "@mui/material/MenuItem";
import FormControl from "@mui/material/FormControl";
import Select from "@mui/material/Select";

function Courses() {
    const dispatch = useDispatch();
    const courses = useSelector(selectCourses);
    // const coursesLike = useSelector(selectCoursesLike);
    const isLoading = useSelector(selectCoursesLoading);
    const error = useSelector(selectCoursesError);
    console.log(courses);

    const requestCourses = async () => {
        dispatch(getCourses());
    };

    useEffect(() => {
        requestCourses();
    }, []);

    const [filter, setFilter] = React.useState("All");

    const handleChange = (event) => {
        setFilter(event.target.value);
        // debugger;
        // console.log(filter);
    };

    const style = {
        maxWidth: "250px",
        margin: "0 auto",
        marginBottom: "10px",
    };

    return (
        <>
            <h1 className="head">Выберите комикс:</h1>
            {/* <FormControlLabel control={<Checkbox />} label="Избранное" />
            <FormControlLabel control={<Checkbox />} label="Мои комиксы" /> */}

            <Box style={style}>
                <FormControl fullWidth>
                    <InputLabel id="filter">Filter</InputLabel>
                    <Select
                        labelId="filter"
                        label="filter"
                        value={filter}
                        onChange={handleChange}
                    >
                        <MenuItem value="All">All</MenuItem>
                        <MenuItem value="Like">Like</MenuItem>
                        <MenuItem value="Buy">Buy</MenuItem>
                    </Select>
                </FormControl>
            </Box>

            {/* <select>
                <option>Все комиксы</option>
                <option>Понравились</option>
                <option>Купленные</option>
            </select> */}

            <section className="products">
                {isLoading ? (
                    <CircularProgress />
                ) : error ? (
                    <>{!!error && <h3>{error}</h3>}</>
                ) : (
                    <>
                        {Object.keys(courses).map((i) => (
                            <CoursesItem key={i} course={courses[i]} />
                        ))}
                    </>
                )}
            </section>
        </>
    );
}

export default Courses;
