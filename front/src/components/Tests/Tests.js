import "./Tests.css";
import Test1 from "./Test1";
import { useParams } from "react-router-dom";
import { useEffect, useState } from "react";
import { useDispatch, useSelector } from "react-redux";
import {
    selectTests,
    selectTestsError,
    selectTestsLoading,
} from "../../store/tests/testsSelector";
import { getFirstTest } from "../../store/tests/actions";
import Test2 from "./Test2";
import Test3 from "./Test3";
import * as React from "react";
import Test4 from "./Test4";
import CircularProgress from "../curcularProgress/CircularProgress";

function Tests() {
    const { courseId } = useParams();
    const isLoading = useSelector(selectTestsLoading);
    const error = useSelector(selectTestsError);
    const test = useSelector(selectTests)[0];
    const [renderTests, setRenderTest] = useState(0);
    const dispatch = useDispatch();

    const requestTests = async () => {
        dispatch(getFirstTest(courseId));
        console.log("dispatch");
    };

    useEffect(() => {
        requestTests();
    }, []);

    const getTestsHandler = (num) => {
        return setRenderTest(num);
    };

    function switchTests() {
        switch (renderTests) {
            case 2:
                return <Test2 test={test} getTestsHandler={getTestsHandler} />;

            case 3:
                return <Test3 test={test} getTestsHandler={getTestsHandler} />;

            case 4:
                return <Test4 test={test} getTestsHandler={getTestsHandler} />;

            default:
                return (
                    <Test1
                        test={test}
                        courseId={courseId}
                        getTestsHandler={getTestsHandler}
                    />
                );
        }
    }

    return (
        <>
            {isLoading ? (
                <CircularProgress />
            ) : error ? (
                <>{!!error && <h3>{error}</h3>}</>
            ) : test ? (
                <>{switchTests()}</>
            ) : null}
        </>
    );
}

export default Tests;
