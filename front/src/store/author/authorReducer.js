import { STATUS } from "../../constants/status";
import { AUTHOR_FAILURE, AUTHOR_LOADING, AUTHOR_SUCCESS } from "./actions";

const initialAuthor = {
    result: [],
    request: {
        status: STATUS.IDLE,
        error: ""
    }
};

export const authorReducer = (state = initialAuthor, { type, payload }) => {
    switch( type ) {
        case AUTHOR_LOADING:
            return {
                ...state,
                request: {
                    ...state.request,
                    status: STATUS.LOADING
                }
            };
        case AUTHOR_FAILURE:
            return {
                ...state,
                request: {
                    ...state.request,
                    error: payload
                }
            };
        case AUTHOR_SUCCESS:
            return {
                ...state,
                result: payload,
                request: {
                    status: STATUS.SUCCESS,
                    error: ""
                }
            };
        default:
            return state;
    }
};
