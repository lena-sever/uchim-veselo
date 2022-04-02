import { STATUS } from "../../constants/status";
import { LESSONS_FAILURE, LESSONS_LOADING, LESSONS_SUCCESS } from "./actions";

const initialLessons = {
    lessons: [],
    request: {
        status: STATUS.IDLE,
        error: ""
    }
};

export const lessonsReducer = (state = initialLessons, { type, payload }) => {
    switch( type ) {

        case LESSONS_LOADING:
            return {
                ...state,
                request: {
                    ...state.request,
                    status: STATUS.LOADING,
                },
            };

        case LESSONS_SUCCESS:
            return {
                ...state,
                lessons: payload,
                request: {
                    error: "",
                    status: STATUS.SUCCESS
                }
            };

        case LESSONS_FAILURE:
            return {
                ...state,
                request: {
                    error: payload,
                    status: STATUS.FAILURE
                }
            };

        default:
            return state;
    }
};
