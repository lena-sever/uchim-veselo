import { STATUS } from "../../constants/status";

export const selectTests = state => state.testsReducer.tests;
export const selectTestsLoading = state => state.testsReducer.request.status === STATUS.LOADING;
export const selectTestsError = state => state.testsReducer.request.error;
