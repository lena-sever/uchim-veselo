import { auth } from "../../api/api";

export const AUTH_SUCCESS = "AUTH_SUCCESS";
export const LOGOUT = "LOGOUT";
export const ERR = "ERR";
export const TOGGLE_LIKE = "TOGGLE_LIKE";


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

export const toggleLike =(courseId)=>{
    return {
        type: TOGGLE_LIKE,
        payload: courseId,
    }
}

export const login = (payload) => async(dispatch) => {
    try {
        const res = await auth.sigIn( payload );
        if( !res) {
            throw new Error( res.message  );
            dispatch( setErr( res.message ) );

        } else {
            console.log( res );
            if(res==="Неверный пароль") {
                dispatch( setErr( "Неверный пароль" ) );
            } else if(res.name==="Error") {
                dispatch( setErr( "Неверный логин" ) );
            } else {
                dispatch(
                    authSuccess( {
                        name: res.name,
                        email: res.email,
                        id: res.id,
                        course: res.course,
                        err: res.err
                    } )
                );
            }

        }
    } catch( err ) {
        dispatch( setErr( err.message ) );
        console.log(err.message);
    }
};

export const authMe = (payload) => async(dispatch) => {

    try {
        const res = await auth.me( payload );
        if( !res.id ) {
            throw new Error(
                "Some mistake has occurred. We are already working on it"
            );
        } else {
            console.log( res );
            dispatch(
                authSuccess( {
                    name: res.name,
                    email: res.email,
                    id: res.id,
                    course: res.course,
                } )
            );
        }
    } catch( err ) {
        dispatch( setErr( err ) );
    }
};

export const reghMe = (payload) => async(dispatch) => {
    try {
        const res = await auth.sigUp( payload );
        if( !res.id ) {
            throw new Error(
                "Some mistake has occurred. We are already working on it"
            );
        } else {
            dispatch(
                authSuccess( {
                    name: res.name,
                    email: res.email,
                    id: res.id,
                    course: res.course,
                } )
            );
        }
    } catch( err ) {
        dispatch( setErr( err.message ) );
    }
};
