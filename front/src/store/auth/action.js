import { auth } from "../../api/api";

export const AUTH_SUCCESS = "AUTH_SUCCESS";
export const LOGOUT = "LOGOUT";
export const ERR = "ERR";

export const authSuccess = (login) => {
    return {
        type: AUTH_SUCCESS,
        payload: login,
    };
};

export const logout = () => {
    localStorage.clear();
    return {
        type: LOGOUT,
    };
};

export const setErr = (err) => {
    return {
        type: ERR,
        payload: err,
    };
};

export const login = (payload) => async (dispatch) => {
    try {
        const res = await auth.sigIn(payload);
        if (!res.id) {
            console.log(res);
            dispatch(setErr(res));
        } else {
            dispatch(
                authSuccess({
                    name: res.name,
                    email: res.email,
                    id: res.id,
                    course: res.course,
                })
            );
        }
    } catch (err) {
        dispatch(setErr(err));
    }
};

export const authMe = () => async (dispatch) => {
    debugger;
    try {
        const res = await auth.me();
        if (!res) {
            throw new Error(
                "Some mistake has occurred. We are already working on it"
            );
        } else {
            // debugger;
            dispatch(
                authSuccess({
                    name: res.name,
                    email: res.email,
                    id: res.id,
                    course: res.course,
                })
            );
        }
    } catch (err) {
        dispatch(setErr(err));
    }
};

export const reghMe = (payload) => async (dispatch) => {
    try {
        const res = await auth.sigUp(payload);
        if (!res.id) {
            throw new Error(
                "Some mistake has occurred. We are already working on it"
            );
        } else {
            dispatch(
                authSuccess({
                    name: res.name,
                    email: res.email,
                    id: res.id,
                    course: res.course,
                })
            );
        }
    } catch (err) {
        dispatch(setErr(err.message));
    }
};
