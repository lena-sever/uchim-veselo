import { useDispatch, useSelector } from "react-redux";
import { getCourses } from "../../store/courses/actions";
import React, { useEffect, useState } from "react";
import {
    selectCourses,
    selectCoursesError,
    selectCoursesLoading,
} from "../../store/courses/coursesSelectors";
import CoursesItem from "./CoursesItem";
import "./Courses.css";
import CircularProgress from "../curcularProgress/CircularProgress";
import Box from "@mui/material/Box";
import InputLabel from "@mui/material/InputLabel";
import MenuItem from "@mui/material/MenuItem";
import FormControl from "@mui/material/FormControl";
import Select from "@mui/material/Select";
import { selectUser } from "../../store/auth/authSelector";

function Courses() {
    const dispatch = useDispatch();
    const courses = useSelector( selectCourses );
    const isLoading = useSelector( selectCoursesLoading );
    const error = useSelector( selectCoursesError );
    const coursesMe = useSelector( selectUser );
    const [ filter, setFilter ] = useState( "All" );

    const requestCourses = async() => {
        dispatch( getCourses() );
    };

    const handleChange = (event) => {
        setFilter( event.target.value );
    };

    useEffect( () => {
        requestCourses();
    }, [ filter ] );

    const style = {
        maxWidth: "250px",
        margin: "0 auto",
        marginBottom: "20px",
    };

    let array = "";

    if( filter == "All" ) {
        array = courses;
    } else if( filter == "Like" ) {
        let arrayLiked = coursesMe.course;
        array = arrayLiked.filter( (fill) => {
            return fill.like == 1;
        } );
    } else if( filter == "Buy" ) {
        let arrayBuy = coursesMe.course;
        array = arrayBuy.filter( (fill) => {
            return fill.payment == 1;
        } );
    }
    console.log(array);
    return (
        <>
            <h1 className="head">Выберите комикс:</h1>

            { coursesMe.id ? (
                <Box style={ style }>
                    <FormControl fullWidth>
                        <InputLabel id="filter">Filter</InputLabel>
                        <Select
                            labelId="filter"
                            label="filter"
                            value={ filter }
                            onChange={ handleChange }
                        >
                            <MenuItem value="All">All</MenuItem>
                            <MenuItem value="Like">Like</MenuItem>
                            <MenuItem value="Buy">Buy</MenuItem>
                        </Select>
                    </FormControl>
                </Box> ) : null
            }

            <section className="products">
                { isLoading ? (
                    <CircularProgress/>
                ) : error ? (
                    <>{ !!error && <h3>{ error }</h3> }</>
                ) : (
                    <>
                        { Object.keys( array ).map( (i) => (
                            <CoursesItem
                                coursesMe={ coursesMe }
                                key={ i }
                                course={ array[ i ] }
                                filter={ filter }
                            />
                        ) ) }
                    </>
                ) }
            </section>
        </>
    );
}

export default Courses;
