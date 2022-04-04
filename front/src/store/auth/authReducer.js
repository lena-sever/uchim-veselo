import { AUTH_SUCCESS, LOGOUT } from "./action";

const initialCourses = {
    login: ''
}

export const authReducer = (state = initialCourses, action) => {
  switch (action.type) {
      case AUTH_SUCCESS:
          return {
              ...state,
              login: action.payload,
          };
      case LOGOUT:
          return {
              ...state,
              login: '',
          };
      default:
          return state;
  }  
}