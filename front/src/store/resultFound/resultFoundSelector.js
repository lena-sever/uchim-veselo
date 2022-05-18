import { STATUS } from "../../constants/status";

export const selectResultFoundLoading = state => state.resultFoundReducer.request.status === STATUS.LOADING;
export const selectResultFoundError = state => state.resultFoundReducer.request.error;

export const selectResultFound = state => state.resultFoundReducer.result;
