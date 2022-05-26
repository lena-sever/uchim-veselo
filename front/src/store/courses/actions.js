import { coursesAPI } from "../../api/api";
import { authMe } from "../auth/action";

export const COURSES_LOADING = "COURSES::COURSES_LOADING";
export const COURSES_FAILURE = "COURSES::COURSES_FAILURE";
export const COURSES_SUCCESS = "COURSES::COURSES_SUCCESS";
export const GET_COURS = "COURSES::GET_COURS_SUCCESS";

export const getCoursesLoading = () => ({
    type: COURSES_LOADING,
});

export const getCoursesFailure = (err) => ({
    type: COURSES_FAILURE,
    payload: err,
});

export const getCoursesSuccess = (courses) => ({
    type: COURSES_SUCCESS,
    payload: courses,
});
const getCoursSuccess = (cours) => ({
    type: GET_COURS,
    payload: cours,
});

export const getCourses = () => async (dispatch) => {
    dispatch(getCoursesLoading());
    try {
        const response = await coursesAPI.getCourses();
        if (!response.data) {
            throw new Error(
                "Some mistake has occurred. We are already working on it"
            );
        }
        dispatch(getCoursesSuccess(response.data));
    } catch (err) {
        console.log(err);
        dispatch(getCoursesFailure(err.message));
    }
};

export const getCours = (coursId) => async (dispatch) => {
    dispatch(getCoursesLoading());
    try {
        const response = await coursesAPI.getCours(coursId);
        if (!response.data) {
            throw new Error(
                "Some mistake has occurred. We are already working on it"
            );
        }
        dispatch(getCoursSuccess(response.data));
    } catch (err) {
        console.log(err);
        dispatch(getCoursesFailure(err.message));
    }
};

export const addLikeComics = (like) => {
    return coursesAPI.likeComics(like);
};

// export const addLikeComics = (like) => {
//     return coursesAPI.likeComics(like).then(() => authMe());
// };
