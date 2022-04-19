import * as React from "react";
import Radio from "@mui/material/Radio";
import RadioGroup from "@mui/material/RadioGroup";
import FormControlLabel from "@mui/material/FormControlLabel";
import FormControl from "@mui/material/FormControl";
import FormLabel from "@mui/material/FormLabel";
import { NavLink } from "react-router-dom";
import { useEffect, useState } from "react";



function Test2() {
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

    return (
        <>
            <p>Выбери правильное значение:</p>

            <FormControl>
                <FormLabel id="demo-radio-buttons-group-label">Что означает слово нитка?</FormLabel>
                <RadioGroup
                    aria-labelledby="demo-radio-buttons-group-label"
                    defaultValue="female"
                    name="radio-buttons-group"
                >
                    <FormControlLabel value="error1" control={ <Radio/> } label="Толстый канат" onChange={ chengeValue} />
                    <FormControlLabel value="error2" control={ <Radio/> } label="Это такая веревка" onChange={ chengeValue}/>
                    <FormControlLabel value="right" control={ <Radio/> }
                                      label="Тонко скрученные натуральные или химические волокна, предназначенные для изготовления тканей, трикотажа, а также для шитья, вязания, вышивки и т.п." onChange={ chengeValue}/>

                </RadioGroup>
            </FormControl>
            {/*<Answer answer="Деревянный мальчик, выструганный папой Карлом"/>*/ }
            <p style={ styleRight } className="test__right">
                Молодец! Ты выбрал правильное решение.
            </p>
            <p style={ styleError } className="test__error">
                К сожалению, это не верный выбор. Попробуй еще раз.
            </p>

            <p><NavLink to="/test3">Далее </NavLink></p>
        </>
    );
}

export default Test2;
