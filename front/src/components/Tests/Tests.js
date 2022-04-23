import "./Tests.css";
import Test1 from "./Test1";
import { useParams, Navigate } from "react-router-dom";
import { useEffect, useState } from "react";
import { useDispatch, useSelector } from "react-redux";
import { selectTests } from "../../store/tests/testsSelector";
import { getFirstTest } from "../../store/tests/actions";
import Test2 from "./Test2";
import Test3 from "./Test3";
import * as React from "react";
import { getCourses } from "../../store/courses/actions";

// import test from "../../constants/test.json";

function Tests() {
    const { courseId } = useParams();
    const test = useSelector( selectTests )[ 0 ];
    const [ renderTests, setRenderTest ] = useState();
    const dispatch = useDispatch();
    console.log( test );
    console.log(courseId);

    const requestTests = async () => {
        dispatch( getFirstTest( courseId ) );
        console.log('dispatch');
    };

    useEffect(() => {
        requestTests();
    }, [test]);
    //
    // console.log( test );
    //
    // useEffect(  async () => {
    //      dispatch( getFirstTest( courseId ) );
    //     console.log('dispatch');
    //
    // }, [test] );

    const getTestsHandler = (num) => {
        console.log( num );
        return (
            setRenderTest( num )
        );
    };

    // return (
    //     <Test1
    //         test={ test }
    //         addTestsHandler={ addTestsHandler }
    //     />
    // );
    switch( renderTests ) {
        case 2:
            return <Test2 test={ test }
                          getTestsHandler={ getTestsHandler }/>;
        case 3:
            return <Test3 test={ test }
                          getTestsHandler={ getTestsHandler }/>;
        default:
            return <Test1
                test={ test }
                getTestsHandler={ getTestsHandler }
            />;
    }
}

export default Tests;
