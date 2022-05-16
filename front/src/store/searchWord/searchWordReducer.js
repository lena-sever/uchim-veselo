import { SEARCH_WORD } from "./actions";

const initialSearch = {
    word: ""
};

export const SearchWordReducer = (state = initialSearch, { type, payload }) => {
    switch( type ) {
        case SEARCH_WORD:
            return {
                ...state,
                word: payload
            };

        default:
            return state;
    }
};
