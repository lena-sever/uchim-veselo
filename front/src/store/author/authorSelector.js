import { STATUS } from "../../constants/status";

export const selectAuthor = state => state.authorReducer.result;
export const selectAuthorLoading = state => state.authorReducer.request.status === STATUS.LOADING;
export const selectAuthorError = state => state.authorReducer.request.error;
