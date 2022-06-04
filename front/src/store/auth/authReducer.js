import { AUTH_SUCCESS, LOGOUT, ERR, TOGGLE_LIKE } from "./action";

const initialCourses = {
    name: "",
    email: "",
    id: "",
    err: "",
    course: [],

};

export const authReducer = (state = initialCourses, action) => {
    switch( action.type ) {
        case AUTH_SUCCESS:
            return action.payload;
        case LOGOUT:
            return initialCourses;
        case ERR:
            return { ...state, err: action.payload };
        case TOGGLE_LIKE:
            return {
                ...state,
                course: state.course.map( (item) => {
                    if( item.course_id === action.payload ) {
                        return {
                            ...item,
                            like: item.like === 1 ? 0 : 1
                        };
                    }
                    return item;
                } )
            };
        default:
            return state;
    }
};
