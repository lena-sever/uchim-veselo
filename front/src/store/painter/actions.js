import { painterAPI } from "../../api/api";

export { painterAPI } from "../../api/api";
export const PAINTER_LOADING = "PAINTER::PAINTER_LOADING";
export const PAINTER_FAILURE = "PAINTER::PAINTER_FAILURE";
export const PAINTER_SUCCESS = "PAINTER::PAINTER_SUCCESS";
// export const GET_PAINTER_COMICS = "PAINTER::GET_PAINTER_COMICS";

export const getPainterLoading = () => ( {
    type: PAINTER_LOADING
} );

export const getPainterFailure = (err) => ( {
    type: PAINTER_FAILURE,
    payload: err
} );

export const getPainterSuccess = (comics) => ( {
    type: PAINTER_SUCCESS,
    payload: comics
} );

export const getPainterComics = ( painterId ) => async(dispatch) => {
    dispatch( getPainterLoading() );
    try {
        const response = await painterAPI.resultPainter(painterId);
        console.log(response);
        if( !response ) {
            throw new Error( "то-то пошло не так. Мы уже работаем над этим" );
        }
        dispatch( getPainterSuccess( response ) );
    } catch( err ) {
        console.log( err.message );
        dispatch( getPainterFailure( err.message ) );
    }
};
