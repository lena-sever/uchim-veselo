import "./RadioButtons.css";
import FormControl from "@mui/material/FormControl";
import RadioGroup from "@mui/material/RadioGroup";
import FormControlLabel from "@mui/material/FormControlLabel";
import Radio from "@mui/material/Radio";
import * as React from "react";

function RadioButtons({ firstTest, changeValue, disabled }) {
    return (
        <FormControl>
            <RadioGroup
                aria-labelledby="demo-radio-buttons-group-label"
                defaultValue="female"
                name="radio-buttons-group"
            >
                <FormControlLabel className="test__label" value="answer_1" control={ <Radio/> }
                                  label={ firstTest.answer_1 }
                                  onChange={ changeValue } disabled={ disabled }/>
                <FormControlLabel className="test__label" value="answer_2" control={ <Radio/> }
                                  label={ firstTest.answer_2 } onChange={ changeValue } disabled={ disabled }/>
                <FormControlLabel className="test__label" value="answer_3" control={ <Radio/> } label={ firstTest.answer_3 }
                                  onChange={ changeValue } disabled={ disabled }/>
                <FormControlLabel className="test__label" value="answer_4" control={ <Radio/> } label={ firstTest.answer_4 }
                                  onChange={ changeValue } disabled={ disabled }/>
                <FormControlLabel className="test__label" value="answer_5" control={ <Radio/> } label={ firstTest.answer_5 }
                                  onChange={ changeValue } disabled={ disabled }/>
            </RadioGroup>
        </FormControl>
    );
}

export default RadioButtons;
