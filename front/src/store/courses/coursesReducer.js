import {
    COURSES_FAILURE,
    COURSES_LOADING,
    COURSES_SUCCESS,
    GET_COURS,
} from "./actions";
import { STATUS } from "../../constants/status";

const initialCourses = {
    courses: [],
    cours: {},
    request: {
        status: STATUS.IDLE,
        error: "",
    },
};

export const coursesReducer = (state = initialCourses, { type, payload }) => {
    switch (type) {
        case COURSES_LOADING:
            return {
                ...state,
                request: {
                    ...state.request,
                    status: STATUS.LOADING,
                },
            };

        case COURSES_SUCCESS:
            return {
                ...state,
                courses: payload,
                request: {
                    error: "",
                    status: STATUS.SUCCESS,
                },
            };

        case COURSES_FAILURE:
            return {
                ...state,
                request: {
                    error: payload,
                    status: STATUS.FAILURE,
                },
            };

        case GET_COURS:
            return {
                ...state,
                cours: payload,
                request: {
                    error: "",
                    status: STATUS.SUCCESS,
                },
            };

        default:
            return state;
    }
};
