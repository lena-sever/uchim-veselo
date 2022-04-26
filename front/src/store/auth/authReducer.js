import { AUTH_SUCCESS, LOGOUT } from "./action";

const initialCourses = {
    name: "",
    email: "",
    id: "",
};

export const authReducer = (state = initialCourses, action) => {
    switch (action.type) {
        case AUTH_SUCCESS:
            return action.payload;
        case LOGOUT:
            return initialCourses;
        default:
            return state;
    }
};
