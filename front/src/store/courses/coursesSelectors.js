import { STATUS } from "../../constants/status";

export const selectCourses = state => state.coursesReducer.courses;
export const selectCoursesLoading = state => state.coursesReducer.request.status === STATUS.LOADING;
export const selectCoursesError = state => state.coursesReducer.request.error;