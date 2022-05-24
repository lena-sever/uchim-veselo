import "./Test3";
import React, { useEffect, useMemo, useState } from "react";

function WordChoice(props) {
    const [ isTextShown, setTextShown ] = useState( false );
    const [ isCorrectBlink, setCorrectBlink ] = useState( false );
    const [ isIncorrectBlink, setIncorrectBlink ] = useState( false );
    const isReversed = useMemo( () => Math.random() > 0.5, [] );

    const correctButton = <button
        key="correct"
        className="test__correct-button"
        onClick={ () => setCorrectBlink( true ) }
        style={ isCorrectBlink ? {
            animation: "shadowCorrect  1.2s  ease-in-out"
        } : {} }
    >
        { props.item.correctText }
    </button>;

    const incorrectButton = <button
        key="incorrect"
        className="test__incorrect-button"
        onClick={ () => setIncorrectBlink( true ) }
        style={ isIncorrectBlink ? {
            animation: "shadowIncorrect  1.2s  ease-in-out"
        } : {} }
    >
        { props.item.incorrectText }
    </button>;

    useEffect( () => {
        if( !isCorrectBlink ) {
            return;
        }

        if( typeof props.onClick === "function" ) {
            props.onClick();
        }

        const timeoutId = setTimeout( () => {
            setTextShown( true );
            setCorrectBlink( false );


        }, 2000 );

        return () => clearTimeout( timeoutId );
    }, [ isCorrectBlink ] );


    useEffect( () => {
        if( !isIncorrectBlink ) {
            return;
        }

        const timeoutId = setTimeout( () => {
            setIncorrectBlink( false );
        }, 2000 );

        return () => clearTimeout( timeoutId );
    }, [ isIncorrectBlink ] );

    if( props.item.type == "text" ) {
        return (
            <span>{ props.item.content }</span>
        );
    }

    return ( isTextShown
            ? <>{ " " }{ props.item.correctText }{ " " }</>
            : <>
                { !isReversed
                    ? [ correctButton, incorrectButton ]
                    : [ incorrectButton, correctButton ]
                }
            </>

    );


}

export default WordChoice;
