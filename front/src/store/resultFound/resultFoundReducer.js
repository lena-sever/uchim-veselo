import { RESULT_FOUND_FAILURE, RESULT_FOUND_LOADING, RESULT_FOUND_SUCCESS } from "./actions";
import { STATUS } from "../../constants/status";

const initialState = {
    result: [],
    request: {
        status: STATUS.IDLE,
        error: ""
    }
};

export const resultFoundReducer = (state = initialState, { type, payload }) => {
    switch( type ) {
        case RESULT_FOUND_SUCCESS:
            return {
                ...state,
                result: payload,
                request: {
                    error: "",
                    status: STATUS.SUCCESS
                }

            };
        case RESULT_FOUND_LOADING:
            return {
                ...state,
                request: {
                    ...state.request,
                    status: STATUS.LOADING
                }
            };
        case RESULT_FOUND_FAILURE:
            return {
                ...state,
                request: {
                    status:STATUS.FAILURE,
                    error: payload
                }
            }
        default:
            return state;
    }
};
