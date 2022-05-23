import "./TestSlider.css";
import * as React from "react";
import TestSliderButton from "./TestSliderButton";
import Slider from "react-slick";

function TestSlider(props) {

    const settings = {
        dots: false,
        arrows: true,
        infinite: false,
        speed: 500,
        slidesToShow: 1,
        slidesToScroll: 1,
        swipe: false,
        nextArrow: props.isAnswerCorrect && !props.isLastSentence ? <TestSliderButton handleClick={ () => {
            props.getAnswerCorrect( false );
        }
        }/> : null
    };

    return (
        <Slider { ...settings }>
            { props.arr.map( (item, index) => {
                    console.log(  index );

                    return (
                        <div className="test__answers-wrap">
                            <p className="test__sentences-block" key={ index }>

                                { item.words.map( (el, i) => {
                                        return <span className="test__sentences-word"
                                                     onClick={ () => {
                                                         props.addWordHandler( index, el, i );
                                                         props.getSlideIndex( index );
                                                         // props.getNumberOfSlide(index + 1)
                                                     } }>{ el }</span>;
                                    }
                                ) }
                            </p>
                            <p className="test__answers">
                                {
                                    props.answer[ index ].map( (it, j) => (
                                        <span className="test__sentences-word"
                                              key={ j }
                                              onClick={ () => {
                                                  props.deleteWordHandler( it, j );
                                              } }>{ it }</span> ) )
                                }
                            </p>
                            <span className="test__answers-count">{ index + 1 } / {props.arr.length}</span>
                            { props.isAnswerCorrect && <p className="test__correct center">Молодец!</p> }
                        </div>


                );
                }
            ) }

        </Slider>
    );
}

export default TestSlider;
