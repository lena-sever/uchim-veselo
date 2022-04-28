import "./Tests.css";
import FormControl from "@mui/material/FormControl";
import FormLabel from "@mui/material/FormLabel";
import RadioGroup from "@mui/material/RadioGroup";
import FormControlLabel from "@mui/material/FormControlLabel";
import Radio from "@mui/material/Radio";
import * as React from "react";
import { useState } from "react";
import { NavLink } from "react-router-dom";


function Test1({ courseId, test, getTestsHandler }) {
    const [ value, setValue ] = useState( "" );
    const [ disabled, setDisabled ] = useState( false );
    const path = `/courses/${ courseId }/slider2`;

    function changeValue(event) {
        setValue( event.target.value );
        setDisabled( true );
    }

    return (
        <section className="test">
            <h2 className="test__title">{ test.test_title } <span className="test__word">{ test.word }</span></h2>
            <FormControl>
                <RadioGroup
                    aria-labelledby="demo-radio-buttons-group-label"
                    defaultValue="female"
                    name="radio-buttons-group"
                >
                    <FormControlLabel value="answer_1" control={ <Radio/> } label={ test.answer_1 }
                                      onChange={ changeValue } disabled={ disabled }/>
                    <FormControlLabel value="answer_2" control={ <Radio/> }
                                      label={ test.answer_2 } onChange={ changeValue } disabled={ disabled }/>
                    <FormControlLabel value="answer_3" control={ <Radio/> } label={ test.answer_3 }
                                      onChange={ changeValue } disabled={ disabled }/>
                    <FormControlLabel value="answer_4" control={ <Radio/> } label={ test.answer_4 }
                                      onChange={ changeValue } disabled={ disabled }/>
                    <FormControlLabel value="answer_5" control={ <Radio/> } label={ test.answer_5 }
                                      onChange={ changeValue } disabled={ disabled }/>
                </RadioGroup>
            </FormControl>

            {
                value == test.right_answer ? (
                    <div className="test__correct">
                        <p>
                            Молодец! Ты выбрал правильное решение и помог нашему герою. Спасибо!
                        </p>
                        <p><NavLink to={ path }>Вернуться к истории</NavLink></p>
                    </div>
                ) : ( value != test.right_answer && value != "" ) ? (
                    <div className="test__bottom">
                        <p className="test__error">
                            К сожалению, это неверный выбор. Давай вместе разберем значение этого слова.
                        </p>
                        <button className="test__btn"
                            onClick={ () => {
                                getTestsHandler( 2 );
                            } }
                        >Далее
                        </button>
                    </div>
                ) : null
            }


        </section>
    );
}

export default Test1;
