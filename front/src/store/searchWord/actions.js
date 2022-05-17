export const SEARCH_WORD = "SEARCH:: SEARCH_WORD";

export const getSearchWord = (word) => ( {
    type: SEARCH_WORD,
    payload: word
} );
