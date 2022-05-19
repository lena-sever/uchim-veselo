import { authorAPI } from "../../api/api";

export { authorAPI } from "../../api/api";
export const AUTHOR_LOADING = "AUTHOR::AUTHOR_LOADING";
export const AUTHOR_FAILURE = "AUTHOR::AUTHOR_FAILURE";
export const AUTHOR_SUCCESS = "AUTHOR::AUTHOR_SUCCESS";
// export const GET_AUTHOR_COMICS = "AUTHOR::GET_AUTHOR_COMICS";

export const getAuthorLoading = () => ( {
    type: AUTHOR_LOADING
} );

export const getAuthorFailure = (err) => ( {
    type: AUTHOR_FAILURE,
    payload: err
} );

export const getAuthorSuccess = (comics) => ( {
    type: AUTHOR_SUCCESS,
    payload: comics
} );

export const getAuthorComics = ( authorId ) => async(dispatch) => {
    dispatch( getAuthorLoading() );
    try {
        const response = await authorAPI.resultAuthor(authorId);
        console.log(response);
        if( !response ) {
            throw new Error( "то-то пошло не так. Мы уже работаем над этим" );
        }
        dispatch( getAuthorSuccess( response ) );
    } catch( err ) {
        console.log( err.message );
        dispatch( getAuthorFailure( err.message ) );
    }
};
