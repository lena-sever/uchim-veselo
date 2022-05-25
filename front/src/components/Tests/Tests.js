import "./Tests.css";
import * as React from "react";
import { useParams, } from "react-router-dom";
import { useEffect, useState } from "react";
import { useDispatch, useSelector } from "react-redux";
import {
    selectFirstTests,
    selectSecondTests,
    selectTestsError,
    selectTestsLoading
} from "../../store/tests/testsSelector";
import { getFirstTest, getSecondTest } from "../../store/tests/actions";
import CircularProgress from "../curcularProgress/CircularProgress";
import Test1 from "./Test1/Test1";
import Test2 from "./Test2/Test2";
import Test3 from "./Test3/Test3";
import Test4 from "./Test4/Test4";
import Test5 from "./Test5/Test5";
import { getCourseId } from "../../store/courseId/actions";

function Tests() {
    const { courseId } = useParams();
    const isLoading = useSelector( selectTestsLoading );
    const error = useSelector( selectTestsError );
    const firstTest = useSelector( selectFirstTests )[ 0 ];
    const secondTest = useSelector( selectSecondTests );
    const [ renderTests, setRenderTest ] = useState( 0 );
    const dispatch = useDispatch();
    const path = `/courses/${ courseId }/slider3`;

    const requestFirstTests = async() => {
        dispatch( getFirstTest( courseId ) );
    };

    const requestSecondTests = async() => {
        dispatch( getSecondTest( courseId ) );
    };

    useEffect( async() => {
        await requestFirstTests();
        await requestSecondTests();
        dispatch( getCourseId( courseId ) );
    }, [] );

    const getTestsHandler = (num) => {
        return (
            setRenderTest( num )
        );
    };

    function switchTests() {
        switch( renderTests ) {
            case 1:
                return <Test1
                    path={ path }
                    firstTest={ firstTest }
                    getTestsHandler={ getTestsHandler }/>;

            case 2:
                return <Test2
                    firstTest={ firstTest }
                    getTestsHandler={ getTestsHandler }/>;

            case 3:
                return <Test3
                    firstTest={ firstTest }
                    secondTest={ secondTest }
                    getTestsHandler={ getTestsHandler }/>;

            case 4:
                return <Test4
                    firstTest={ firstTest }
                    secondTest={ secondTest }
                    getTestsHandler={ getTestsHandler }/>;

            case 5:
                return <Test5
                    path={ path }
                    firstTest={ firstTest }
                    secondTest={ secondTest }
                    getTestsHandler={ getTestsHandler }/>;

            default:
                return <Test1
                    path={ path }
                    firstTest={ firstTest }
                    getTestsHandler={ getTestsHandler }
                />;
        }
    }

    return (
        <section className="test">
            {
                isLoading ? (
                    <CircularProgress/>
                ) : error ? (
                    <>{ !!error && <h3>{ error }</h3> }</>
                ) : firstTest ? (
                    <>
                        { switchTests() }
                    </>
                ) : null
            }
        </section>
    );
}

export default Tests;
