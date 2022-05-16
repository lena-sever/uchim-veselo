import { FIRST_TESTS_SUCCESS, SECOND_TESTS_SUCCESS, TESTS_FAILURE, TESTS_LOADING} from "./actions";
import { STATUS } from "../../constants/status";

const initialTests = {
    firstTests: [],
    secondTests: [],
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

        case FIRST_TESTS_SUCCESS:
            return {
                ...state,
                firstTests: payload,
                request: {
                    error: "",
                    status: STATUS.SUCCESS
                }
            };

        case SECOND_TESTS_SUCCESS:
            return {
                ...state,
                secondTests: payload,
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
