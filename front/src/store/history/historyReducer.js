import { lessonsAPI } from "../../api/api";

const initialState = {
    firstPathHistory: [],
    lastPathHistort: [],
    err: "",
};

const GET_FIRST_HISTORY = "GET_FIRST_HISTORY";
const GET_LAST_HISTORY = "GET_LAST_HISTORY";
const SET_ERR = "SET_ERR";

const setFirstHistory = (payload) => {
    return {
        type: GET_FIRST_HISTORY,
        payload,
    };
};

const setLasttHistory = (payload) => {
    return {
        type: GET_LAST_HISTORY,
        payload,
    };
};

const serErr = (err) => {
    return {
        type: SET_ERR,
        err,
    };
};

export const getFirstHistory = (id) => async (dispatch) => {
    try {
        const response = await lessonsAPI.getFistPartHistory(id);
        if (!response.data) {
            throw new Error(
                "Some mistake has occurred. We are already working on it"
            );
        } dispatch(setFirstHistory(response.data));
    } catch (err) {
        dispatch(serErr(err.message));
    }
};

export const getLastHistory = (id) => async (dispatch) => {
    try {
        const response = await lessonsAPI.getLastPartHistory(id);
        
        if (!response.data) {
            throw new Error(
                "Some mistake has occurred. We are already working on it"
            );
        } dispatch(setLasttHistory(response.data));
    } catch (err) {
        
        dispatch(serErr(err.message));
    }
};

export const historyReducer = (state = initialState, action) => {
    switch (action.type) {
        case GET_FIRST_HISTORY:
            return {
                ...state,
                firstPathHistory: action.payload,
            };
        case GET_LAST_HISTORY:
            return {
                ...state,
                lastPathHistort: action.payload,
            };
            case SET_ERR:
            return {
                ...state,
                err: action.err,
            };
        default:
            return state;
    }
};
