import { TESTS_FAILURE, TESTS_LOADING, TESTS_SUCCESS } from "./actions";
import { STATUS } from "../../constants/status";

const initialTests = {
    tests: [],
    request: {
        status: STATUS.IDLE,
        error: ""
    }
};

export const testsReducer = (state = initialTests, { type, payload }) => {
    switch( type ) {
        case TESTS_LOADING:
            return {
                ...state,
                request: {
                    ...state.request,
                    status: STATUS.LOADING
                }
            };
        case TESTS_SUCCESS:
            return {
                ...state,
                tests: payload,
                request: {
                    error: "",
                    status: STATUS.SUCCESS
                }
            };

        case TESTS_FAILURE:
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
