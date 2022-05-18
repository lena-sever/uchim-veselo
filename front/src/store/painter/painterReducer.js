import { STATUS } from "../../constants/status";
import { PAINTER_FAILURE, PAINTER_LOADING, PAINTER_SUCCESS } from "./actions";

const initialPainter = {
    result: [],
    request: {
        status: STATUS.IDLE,
        error: ""
    }
};

export const painterReducer = (state = initialPainter, { type, payload }) => {
    switch( type ) {
        case PAINTER_LOADING:
            return {
                ...state,
                request: {
                    ...state.request,
                    status: STATUS.LOADING
                }
            };
        case PAINTER_FAILURE:
            return {
                ...state,
                request: {
                    ...state.request,
                    error: payload
                }
            };
        case PAINTER_SUCCESS:
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
