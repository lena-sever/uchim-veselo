import { STATUS } from "../../constants/status";

export const selectFirstTests = state => state.testsReducer.firstTests;
export const selectSecondTests = state => state.testsReducer.secondTests;
export const selectTestsLoading = state => state.testsReducer.request.status === STATUS.LOADING;
export const selectTestsError = state => state.testsReducer.request.error;
