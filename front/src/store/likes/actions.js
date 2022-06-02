// import { likesAPI } from "../../api/api";
//
// export const LIKES_LOADING = "LIKES::LIKES_LOADING";
// export const LIKES_FAILURE = "LIKES::LIKES_FAILURE";
// export const LIKES_SUCCESS = "LIKES::LIKES_SUCCESS";
//
// export const getLikesLoading = () => ( {
//     type: LIKES_LOADING
// } );
//
// export const getLikesFailure = (err) => ( {
//     type: LIKES_FAILURE,
//     payload: err
// } );
//
// export const getLikesSuccess = (likes) => ( {
//     type: LIKES_LOADING,
//     payload: likes
// } );
//
// export const addLikeComics = (payload) => async(dispatch) => {
//     // dispatch( getLikesLoading() );
//     try {
//         const response = await likesAPI.getLikes( payload );
//         if( !response ) {
//             throw new Error(
//                 "Что-то пошло не так. Мы уже работаем над этим"
//             );
//         }
//         dispatch( getLikesSuccess( response ) );
//         console.log(response);
//         console.log(typeof(response) );
//     } catch( err ) {
//         console.log( err );
//         dispatch( getLikesFailure( err.message ) );
//     }
// };
