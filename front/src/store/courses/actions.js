import { urlCourses } from "../../constants/url";

export const COURSES_LOADING = "COURSES::COURSES_LOADING";
export const COURSES_FAILURE = "COURSES::COURSES_FAILURE";
export const COURSES_SUCCESS = "COURSES::COURSES_SUCCESS";

export const getCoursesLoading = () => ( {
  type: COURSES_LOADING
} );

export const getCoursesFailure = (err) => ( {
  type: COURSES_FAILURE,
  payload: err
} );

export const getCoursesSuccess = (courses) => ( {
  type: COURSES_SUCCESS,
  payload: courses
} );

export const getCourses = () => async(dispatch) => {
  dispatch( getCoursesLoading() );
  try {
    const response = await fetch( urlCourses );
    if( !response.ok ) {
      throw new Error( "Some mistake has occurred. We are already working on it" );
    }
    // const result = await response.text();
    const result = await response.json();
    // console.log( result );
    dispatch( getCoursesSuccess( result ) );

  } catch( err ) {
    console.log( err );
    dispatch( getCoursesFailure( err.message ) );
  }
};