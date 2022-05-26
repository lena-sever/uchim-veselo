import { useDispatch, useSelector } from "react-redux";
import { getCourses } from "../../store/courses/actions";
import React, { useEffect } from "react";

import {
    selectCourses,
    selectCoursesError,
    selectCoursesLoading,
} from "../../store/courses/coursesSelectors";
import CoursesItem from "./CoursesItem";
import "./Courses.css";
import CircularProgress from "../curcularProgress/CircularProgress";
import Footer from "../Footer/Footer";
import Header from "../Header/Header";

import Box from "@mui/material/Box";
import InputLabel from "@mui/material/InputLabel";
import MenuItem from "@mui/material/MenuItem";
import FormControl from "@mui/material/FormControl";
import Select from "@mui/material/Select";

import { selectUser } from "../../store/auth/authSelector";
import { fill } from "lodash";
// import { likedCourses } from "../../store/auth/action";

function Courses() {
    const dispatch = useDispatch();
    const courses = useSelector(selectCourses);
    const isLoading = useSelector(selectCoursesLoading);
    const error = useSelector(selectCoursesError);
    console.log(courses);

    const requestCourses = async () => {
        dispatch(getCourses());
    };

    useEffect(() => {
        requestCourses();
    }, []);
    const coursesMe = useSelector(selectUser);

    const [filter, setFilter] = React.useState("All");

    const handleChange = (event) => {
        setFilter(event.target.value);
    };

    const style = {
        maxWidth: "250px",
        margin: "0 auto",
        marginBottom: "10px",
    };

    let array = "";

    if (filter == "All") {
        array = courses;
    } else if (filter == "Like") {
        let arrayLiked = coursesMe.course;
        array = arrayLiked.filter((fill) => {
            return fill.like == 1;
        });
    } else if (filter == "Buy") {
        let arrayBuy = coursesMe.course;
        array = arrayBuy.filter((fill) => {
            return fill.payment == 1;
        });
    }

    return (
        <>
            <h1 className="head">Выберите комикс:</h1>

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

            <section className="products">
                {isLoading ? (
                    <CircularProgress />
                ) : error ? (
                    <>{!!error && <h3>{error}</h3>}</>
                ) : (
                    <>
                        {Object.keys(array).map((i) => (
                            <CoursesItem
                                filter={filter}
                                coursesMe={coursesMe}
                                key={i}
                                course={array[i]}
                            />
                        ))}
                    </>
                )}
            </section>
        </>
    );
}

export default Courses;
