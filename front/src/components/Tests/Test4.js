import * as React from "react";
import { useEffect, useState } from "react";
import test from "../../constants/test.json";
import Slider from "react-slick";
import "slick-carousel/slick/slick.css";
import "slick-carousel/slick/slick-theme.css";
import TestSliderButton from "./TestSliderButton";

const initialArr = test.sentences;
const response=[]
for( let i = 0; i < test.sentences.length; i++ ) {
    response.push( [] );
}
const initialAnswer=response

function Test4({ getTestsHandler }) {
    // const [ disabled, setDisabled ] = useState( true );
    const [ answer, setAnswer ] = useState( initialAnswer );
    const [ displayCorrect, setDisplayCorrect ] = useState( "none" );
    const [ styleButton, setStyleButton ] = useState( "none" );
    const [ index, setIndex ] = useState( 0 );
    const [ opacity, setOpacity ] = useState( 0 );
    const [ arr, setArr ] = useState( initialArr );
    // console.log( arr.length );


    // useEffect( () => {
    //     for( let i = 0; i <= test.sentences.length; i++ ) {
    //         answer.push( [] );
    //     }
    // },[] );


    // console.log( answer );
    // console.log( arr[ index ] );
    // if( arr[ index ] == [] ) {
    //     setArr( initialState );
    // }

    const styleCorrect = {
        display: displayCorrect
    };

    const styleButtonTest = {
        display: styleButton
    };

    // const addWordHandler = (index, el, i) => {
    //     setAnswer( [ ...answer, el ] );
    //     arr[ index ].splice( i, 1 );
    // };
    const addWordHandler = (index, el, i) => {
        // answer[ index ] = [];
        // console.log( answer[ index ] );
        answer[ index ].push( el );
        setAnswer( [ ...answer ] );
        console.log( answer[index].join( " " ) );
        arr[ index ].splice( i, 1 );
    };

    const deleteWordHandler = (it, j) => {
        arr[ index ].push( it );
        setArr( [ ...arr ] );
        answer[index].splice( j, 1 );
        console.log( arr[ index ]);
    };

    // useEffect( () => {
    //     if( arr[ 0 ] == [] ) {
    //         setArr( initialState );
    //     }
    // }, [  ] );

    useEffect( () => {
        if( answer[index].join( " " ) == test.correctAnswers[ index ] ) {
            setDisplayCorrect( "block" );
            setOpacity( 1 );

            if( index == test.sentences.length - 1 ) {
                setOpacity( 0 );
                setStyleButton( "block" );
            }

            const t = setTimeout( () => {
                setDisplayCorrect( "none" );
                setOpacity( 0 );
                // setAnswer( [] );

            }, 3000 );

            return () => clearTimeout( t );
        }

    }, [ answer ] );

    const settings = {
        dots: false,
        arrows: true,
        infinite: false,
        speed: 500,
        slidesToShow: 1,
        slidesToScroll: 1,
        swipe: false,
        nextArrow: <TestSliderButton opacity={ opacity }/>
    };


    return (
        <section className="test">
            <h2 className="test__title ">Составьте правильно предложение из имеющегося набора слов: </h2>
            <p>(Кликни по слову, чтобы добавить его в предложение)</p>
            <div className="test__slider-wrapper">
                <Slider { ...settings }>
                    { arr.map( (item, index) => {
                            //     answer.push( [] );
                            // console.log(answer);
                            return (
                                <div className="test__answers-wrap">
                                    <p className="test__sentences-block" key={ index }>
                                        {/*{ item.map( (el, i) => { */}
                                            { arr[index].map( (el, i) => {
                                                return <span className="test__sentences-word"
                                                             onClick={ () => {
                                                                 addWordHandler( index, el, i );
                                                                 setIndex( index );
                                                             } }>{ el }</span>;
                                            }
                                        ) }
                                    </p>
                                    <p className="test__answers">
                                        {
                                            answer[ index ].map( (it, j) => (
                                                <span className="test__sentences-word"
                                                      key={ j }
                                                      onClick={ () => {
                                                          deleteWordHandler( it, j );
                                                      } }>{ it }</span> ) )
                                        }
                                    </p>
                                    <p style={ styleCorrect } className="test__correct center">Молодец!</p>
                                </div>
                            );

                        }
                    ) }

                </Slider>
            </div>
            <div className="test__bottom">
                <button style={ styleButtonTest }
                        className="test__btn"
                        onClick={ () => {
                            getTestsHandler( 1 );
                        } }
                >Далее
                </button>
            </div>

        </section>
    );
}

export default Test4;
