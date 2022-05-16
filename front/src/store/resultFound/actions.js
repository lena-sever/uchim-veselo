import { resultFoundAPI } from "../../api/api";

export const RESULT_FOUND_SUCCESS = "RESULT::RESULT_FOUND_SUCCESS";
export const RESULT_FOUND_LOADING = "RESULT::RESULT_FOUND_LOADING";
export const RESULT_FOUND_FAILURE = "RESULT::RESULT_FOUND_FAILURE";

export const getResultFoundLoading = () => ( {
    type: RESULT_FOUND_LOADING,
} );

export const getResultFoundFailure = (err) => ( {
    type: RESULT_FOUND_FAILURE,
    payload: err,
} );

export const getResultFoundSuccess = (result) => ( {
    type: RESULT_FOUND_SUCCESS,
    payload: result
} );

export const getResultFound = (word) => async(dispatch) => {
    dispatch( getResultFoundLoading() );
    try {
        const response = await resultFoundAPI.resultFound( word );
        console.log( response );
        if( !response ) {
            throw new Error( " Что-то пошло не так. Мы уже работаем над этим" );
        }
        dispatch( getResultFoundSuccess( response) );
    } catch( err ) {
        console.log( err.message );
        dispatch( getResultFoundFailure( err.message ) );
    }
};

