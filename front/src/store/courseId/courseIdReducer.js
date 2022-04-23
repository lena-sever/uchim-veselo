import { COURSE_ID } from "./actions";

const initialCourseId = {
    courseId: 0
};

export const courseIdReducer = (state = initialCourseId, { action, payload }) => {
    switch( action ) {
        case COURSE_ID:
            console.log(payload);
            return {
                ...state,
                courseId: payload
            };

        default:
            return state;
    }
};
