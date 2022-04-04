import { lessonsAPI } from "../../api/api";

export const LESSONS_LOADING = "LESSONS::LESSONS_LOADING";
export const LESSONS_FAILURE = "LESSONS::LESSONS_FAILURE";
export const LESSONS_SUCCESS = "LESSONS::LESSONS_SUCCESS";

export const getLessonsLoading = () => ({
    type: LESSONS_LOADING,
});

export const getLessonsFailure = (err) => ({
    type: LESSONS_FAILURE,
    payload: err,
});

export const getLessonsSuccess = (lessons) => ( {
    type: LESSONS_SUCCESS,
    payload: lessons,
} );

export const getLessons = (courseId) => async(dispatch) => {
    dispatch( getLessonsLoading() );
    try {
        const response = await lessonsAPI.getCourse( courseId );

        if( !response.data ) {
            throw new Error(
                "Some mistake has occurred. We are already working on it"
            );
        }
        dispatch( getLessonsSuccess( response.data.lessons ) );
    } catch( err ) {
        console.log( err );
        dispatch( getLessonsFailure( err.message ) );
    }
};
