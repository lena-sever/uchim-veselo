import { useDispatch, useSelector } from "react-redux";
import { getCourses,} from "../../store/courses/actions";
import { useEffect } from "react";
// import { courses } from "../../constants/courses";
// import CircularProgress from "../curcularProgress/CircularProgress";
import { CircularProgress } from "@mui/material";
import { selectCourses, selectCoursesError, selectCoursesLoading } from "../../store/courses/coursesSelectors";
import CoursesItem from "./CoursesItem";
import "./Courses.css";


function Courses() {
  const dispatch = useDispatch();
  const courses = useSelector( selectCourses );
  const isLoading = useSelector( selectCoursesLoading );
  const error = useSelector( selectCoursesError );

  const requestCourses = async() => {
    dispatch( getCourses() );
  };

  useEffect( () => {
    requestCourses();
  }, [] );
  // console.log( courses  );
  // console.log( Object.keys( courses ) );
  return (
    <div className="courser-wrapper">
      <h1>Выберите курс:</h1>
      {
        isLoading ? (
            <CircularProgress/>
          ) : error ? (
            <>
              {!!error && <h3>{error}</h3>}
            </>
        ) :
          (
            <div className="courses-wrapp">
              {
                Object.keys( courses ).map( i => (
                  <CoursesItem key={ i } course={ courses[ i ] }/>
                ) )
              }
            </div>
          )
      }
    </div>
  );
}

export default Courses;