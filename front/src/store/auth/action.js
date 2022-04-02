import { auth } from "../../api/api";

export const AUTH_SUCCESS = "AUTH_SUCCESS";
export const LOGOUT = "LOGOUT";

const authSuccess = (login) => {
    return {
        type: AUTH_SUCCESS,
        payload: login,
    };
};

export const logout = () => {
    return {
        type: LOGOUT,
    };
};

export const authMe = (payload) => async (dispatch) => {
    try {
        const res = await auth.sigIn(payload);
        if (!res) {
            throw new Error(
                "Some mistake has occurred. We are already working on it"
            );
        } else {
            dispatch(authSuccess(payload.login));   
        }
    } catch {}
};

export const reghMe = (payload) => async (dispatch) => {
    try {
        const res = await auth.sigUp(payload);
        if (!res) {
            throw new Error(
                "Some mistake has occurred. We are already working on it"
            );
        } else {
            dispatch(authSuccess(payload.login));
        }
    } catch {}
};
