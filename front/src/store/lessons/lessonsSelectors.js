import { STATUS } from "../../constants/status";

export const selectLessons = state => state.lessonsReducer.lessons;
export const selectLessonsLoading = state => state.lessonsReducer.request.status === STATUS.LOADING;
export const selectLessonsError = state => state.lessonsReducer.request.error;
