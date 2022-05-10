import { COURSE_ID, PATH } from "./actions";

const initialState = {
    courseId: ""
};

export const courseIdReducer = (state = initialState, { type, payload }) => {
    switch( type ) {
        case COURSE_ID:
            return {
                ...state,
                courseId: payload
            };

        default:
            return state;
    }
};
