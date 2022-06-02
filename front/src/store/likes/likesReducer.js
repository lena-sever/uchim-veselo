// import { STATUS } from "../../constants/status";
// import { LIKES_FAILURE, LIKES_LOADING, LIKES_SUCCESS } from "./actions";
//
// const initialLikes = {
//     like: "",
//     request: {
//         status: STATUS.IDLE,
//         error: ""
//     }
// };
//
// export const likesReducer = (state = initialLikes, { type, payload }) => {
//     switch( type ) {
//         case LIKES_LOADING:
//             return {
//                 ...state,
//                 request: {
//                     ...state.request,
//                     status: STATUS.LOADING
//                 }
//             };
//         case LIKES_SUCCESS:
//             return {
//                 ...state,
//                 like: payload,
//                 request: {
//                     error: "",
//                     status: STATUS.SUCCESS
//                 }
//             };
//         case LIKES_FAILURE:
//             return {
//                 ...state,
//                 error: payload,
//                 status: STATUS.FAILURE
//             };
//         default:
//             return state;
//     }
// };
