import "./Test4.css";
import "../Tests.css";
import * as React from "react";
import { useEffect, useState } from "react";
import "slick-carousel/slick/slick.css";
import "slick-carousel/slick/slick-theme.css";
import TestTitle from "../TestTitle/TestTitle";
import TestButton from "../TestButton/TestButton";
import TestSlider from "./TestSlider";

function Test4({ secondTest, getTestsHandler }) {
    // Создаем массив из пустых массивов по числу предложений из БД
    const [ answer, setAnswer ] = useState( () => {
        const out = [];
        for( let i = 0; i < secondTest.sentences.length; i++ ) {
            out.push( [] );
        }
        return out;
    } );

    const [ isAnswerCorrect, setAnswerCorrect ] = useState( false );
    const [ isLastSentence, setLastSentence ] = useState( false );
    const [ index, setIndex ] = useState( 0 );
    const initialArr = secondTest.sentences;
    const [ arr, setArr ] = useState( initialArr );

    const addWordHandler = (index, el, i) => {
        answer[ index ].push( el );
        setAnswer( [ ...answer ] );
        arr[ index ].words.splice( i, 1 );
    };

    const deleteWordHandler = (it, j) => {
        arr[ index ].words.push( it );
        setArr( [ ...arr ] );
        answer[ index ].splice( j, 1 );
    };

    // Функция для получения данных от дочернего компонента
    const getSlideIndex = (index) => {
        setIndex( index );
    };

    // Функция для получения данных от дочернего компонента
    const getAnswerCorrect = (answer) => {
        setAnswerCorrect( answer );
    };

    useEffect( () => {

        if( answer[ index ].join( " " ) === secondTest.sentences[ index ].right_sentence ) {
            setAnswerCorrect( true );

            if( index == ( secondTest.sentences.length - 1 ) ) {
                setAnswerCorrect( true );
                setLastSentence( true );
            }
        }

    }, [ answer ] );

    return (
        <>
            <TestTitle title="Составьте правильно предложение из имеющегося набора слов"/>
            <p>(Кликни по слову, чтобы добавить его в предложение)</p>
            <div className="test__slider-wrapper">
                <TestSlider
                    isAnswerCorrect={ isAnswerCorrect }
                    isLastSentence={ isLastSentence }
                    addWordHandler={ addWordHandler }
                    deleteWordHandler={ deleteWordHandler }
                    arr={ arr }
                    answer={ answer }
                    getSlideIndex={ getSlideIndex }
                    getAnswerCorrect={ getAnswerCorrect }

                />

            </div>
            <div className="test__bottom">
                {
                    isAnswerCorrect && isLastSentence && <TestButton getTestsHandler={ getTestsHandler } num={ 5 }/>
                }
            </div>

        </>
    );
}

export default Test4;