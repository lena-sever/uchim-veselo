import { COURSES_FAILURE, COURSES_LOADING, COURSES_SUCCESS } from "./actions";
import { STATUS } from "../../constants/status";

const initialCourses = {
   courses: {},
  request: {
    status: STATUS.IDLE,
    error: ""
  }
};

export const coursesReducer = (state = initialCourses, { type, payload }) => {
  switch( type ) {

    case COURSES_LOADING:
      return {
        ...state,
        request: {
          ...state.request,
          status: STATUS.LOADING
        }
      };

    case COURSES_SUCCESS:
      return {
        ...state,
        courses: payload,
        request: {
          error: "",
          status: STATUS.SUCCESS
        }
      };

    case COURSES_FAILURE:
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