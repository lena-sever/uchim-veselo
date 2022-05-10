import { testsAPI } from "../../api/api";

export const TESTS_LOADING = "TESTS::TESTS_LOADING";
export const TESTS_FAILURE = "TESTS::TESTS_FAILURE";
export const FIRST_TESTS_SUCCESS = "TESTS::FIRST_TESTS_SUCCESS";
export const SECOND_TESTS_SUCCESS = "TESTS::SECOND_TESTS_SUCCESS";

export const getTestsLoading = () => ( {
    type: TESTS_LOADING,
} );

export const getTestsFailure = (err) => ( {
    type: TESTS_FAILURE,
    payload: err,
} );

export const getFirstTestsSuccess = (tests) => ( {
    type: FIRST_TESTS_SUCCESS,
    payload: tests,
} );

export const getSecondTestSuccess = (tests) => ( {
    type: SECOND_TESTS_SUCCESS,
    payload: tests
} );

export const getFirstTest = (courseId) => async(dispatch) => {
    dispatch( getTestsLoading() );
    try {
        const response = await testsAPI.getFirstTest( courseId );
        console.log( response.data );
        if( !response.data ) {
            throw new Error( "Some mistake has occurred. We are already working on it" );
        }
        dispatch( getFirstTestsSuccess( response.data ) );
    } catch( err ) {
        console.log( err.message );
        dispatch( getTestsFailure( err.message ) );
    }
};

export const getSecondTest = (courseId) => async(dispatch) => {
    dispatch( getTestsLoading() );
    try {
        const response = await testsAPI.getSecondTest( courseId );
        console.log( response.data );
        if( !response.data ) {
            throw new Error( "Some mistake has occurred. We are already working on it" );
        }
        dispatch( getSecondTestSuccess( response.data ) );
    } catch( err ) {
        dispatch( getTestsFailure( err.message ) );
    }
};
