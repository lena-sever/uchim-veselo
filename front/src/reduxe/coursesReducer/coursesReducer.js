import {coursesAPI} from '../../api/api'

const inintState = {
    list: [{ name: "cours1" }, { name: "cours2" }],
};

const SET_COURSES = "SET_COURSES";

const setCourseAC = (course) => {
    return {
        type: SET_COURSES,
        payload: course,
    };
};

export const setCourse = (
    body
) => {
    return async (dispatch) => {
        const response = await coursesAPI.getCourses(body);
        if (response.resultCode === 0) {;
            dispatch(setCourseAC(response.data));
        } else alert(response.messages[0]);
    };
};

export const coursesReducer = (state = inintState, action) => {
    switch (action.type) {
        case SET_COURSES: {
            return {
               list: [...action.payload],
            };
        }
        default:
            return state;
    }
};