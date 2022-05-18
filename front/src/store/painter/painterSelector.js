import { STATUS } from "../../constants/status";

export const selectPainter = state => state.painterReducer.result;
export const selectPainterLoading = state => state.painterReducer.request.status === STATUS.LOADING;
export const selectPainterError = state => state.painterReducer.request.error;
