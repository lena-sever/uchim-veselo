import "./Tests.css";
import FormControl from "@mui/material/FormControl";
import FormLabel from "@mui/material/FormLabel";
import RadioGroup from "@mui/material/RadioGroup";
import FormControlLabel from "@mui/material/FormControlLabel";
import Radio from "@mui/material/Radio";
import * as React from "react";
import { useEffect, useState } from "react";
import { NavLink } from "react-router-dom";

function Test1() {
    const [ value, setValue ] = useState( 1 );
    const [ displayRight, setDisplayRight ] = useState( "none" );
    const [ displayError, setDisplayError ] = useState( "none" );

    const styleRight = {
        display: displayRight
    };

    const styleError = {
        display: displayError
    };

    function chengeValue(event) {
        setValue( event.target.value );
    }

    useEffect( () => {
        if( value == "right" ) {
            setDisplayRight( "block" );
            setDisplayError( "none" );
        }
        if( value == "error1" || value == "error2" ) {
            setDisplayRight( "none" );
            setDisplayError( "block" );
        }
    }, [ value, displayRight, displayError ] );

    console.log( value );

    return (
        <>
            <p>Выбери правильное значение:</p>

            <FormControl>
                <FormLabel id="demo-radio-buttons-group-label">Кто такой Буратино?</FormLabel>
                <RadioGroup
                    aria-labelledby="demo-radio-buttons-group-label"
                    defaultValue="female"
                    name="radio-buttons-group"
                >
                    <FormControlLabel value="error1" control={ <Radio/> } label="Друг Барби" onChange={ chengeValue }/>
                    <FormControlLabel value="right" control={ <Radio/> }
                                      label="Деревянный мальчик, выструганный папой Карлом" onChange={ chengeValue }/>
                    <FormControlLabel value="error2" control={ <Radio/> } label="Мальчик из нашего класса"
                                      onChange={ chengeValue }/>
                </RadioGroup>
            </FormControl>
            <p style={ styleRight } className="test__right">
                Молодец! Ты выбрал правильное решение.
            </p>
            <p style={ styleError } className="test__error">
                К сожалению, это не верный выбор. Попробуй еще раз.
            </p>

            <p><NavLink to="/test2">Далее </NavLink></p>

        </>
    );
}

export default Test1;
