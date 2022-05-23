import "../Tests.css";
import "./Test3.css";
import { useState, useEffect } from "react";
import { useDispatch } from "react-redux";
import { useParams } from "react-router-dom";
import WordChoice from "./Test3-wordСhoice";
import TestTitle from "../TestTitle/TestTitle";
import TestButton from "../TestButton/TestButton";
import TestsImg from "../TestsImg/TestsImg";
import ButtonBackToComics from "../../ButtonBackToСomics/ButtonBackToСomics";
import * as React from "react";

function Test3({ secondTest, getTestsHandler }) {
    const path = "/courses";
    const [ buttonsState, setButtonsState ] = useState( () => {
        return secondTest.chooseWords.reduce( (acc, item, i) => {
            if( item.type !== "button" ) {
                return acc;
            }

            return {
                ...acc,
                [ i ]: false
            };
        }, {} );
    } );

    const isTestCompleted = Object.values( buttonsState ).reduce( (acc, item) => acc && item, true );


    // const correctAnswerHandler = (e, item) => {
    // console.log( item );
    // // console.log(e.currentTarget);
    // const style = e.currentTarget.style;
    // // const id = e.currentTarget.id;
    // style.animation = "shadowCorrect  2s  ease-in-out";
    // // console.log( "err-" + e.currentTarget.id );
    // const timeout = setTimeout( () => {
    //     // document.getElementById( "err-" + id ).style.display = "none";
    //     style.color = "#000000";
    //     style.backgroundColor = "#ffffff";
    //     style.borderRadius = "none";
    //     style.borderColor = "transparent";
    //     // setShow( false );
    //     // buttonsRef.current.doDisplayNone();
    // }, 2000 );
    //
    // return () => clearTimeout( timeout );

    // };


    // const incorrectAnswerHandler = (e, index) => {
    //     console.log(index);
    //     e.currentTarget.style.animation = "shadowIncorrect  2s  ease-in-out";
    //     // console.log( e.currentTarget.id );
    // };
    return (
        < >
            <TestsImg
                src="https://kartinkin.net/uploads/posts/2021-07/thumbs/1626777553_7-kartinkin-com-p-nitki-fon-krasivo-7.jpg"/>

            <TestTitle title="Выберите правильное слово и нажмите на кнопку"/>
            <p className="test__text ">
                { secondTest.chooseWords.map( (item, index) => {
                    return <WordChoice
                        key={ index }
                        item={ item }
                        onClick={ () => {
                            setButtonsState( {
                                ...buttonsState,
                                [ index ]: true
                            } );
                        } }
                    />;
                } ) }
            </p>

            <div className="test__bottom">
                {
                    ( isTestCompleted ) ?
                        ( <TestButton getTestsHandler={ getTestsHandler } num={ 4 }/> ) : null
                }
                <ButtonBackToComics path={ path } text="Назад к комиксам"/>
            </div>

        </>
    );
}

export default Test3;
