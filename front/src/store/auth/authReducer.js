import { AUTH_SUCCESS, LOGOUT, ERR } from "./action";

const initialCourses = {
    name: "",
    email: "",
    id: "",
    err: ''
};

export const authReducer = (state = initialCourses, action) => {
    switch (action.type) {
        case AUTH_SUCCESS:
            return action.payload;
        case LOGOUT:
            return initialCourses;
        case ERR:
            return {...state, err: action.payload};
        default:
            return state;
    }
};
