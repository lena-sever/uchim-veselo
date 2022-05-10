import React from "react";
import ToggleButton from "@mui/material/ToggleButton";
import ToggleButtonGroup from "@mui/material/ToggleButtonGroup";
import { makeStyles } from "@material-ui/core/styles";

import "./Login.css";
import LoginForm from "./LoginForm";
import RegForm from "./RegForm";
import Header from "../Header/Header";
import Footer from "../Footer/Footer";

const useStyles = makeStyles( (theme) => ( {
    btn: {
        textDecoration: "none",
        textTransform: "uppercase",
        borderRadius: "5px",
        border: "1px solid #b458bf",
    },
    btnGroup: {
        display: "block",
    },
} ) );

const Login = () => {
    const [ alignment, setAlignment ] = React.useState( true );
    const handleChange = (event, newAlignment) => {
        if( newAlignment !== null ) {
            setAlignment( newAlignment );
        }
    };
    const classes = useStyles();
    return (

        <div>
            <h1 className="title">Login</h1>
            <ToggleButtonGroup
                color="primary"
                value={ alignment }
                exclusive
                onChange={ handleChange }
                className={ classes.btnGroup }
            >
                <ToggleButton value={ true }>Вход</ToggleButton>
                <ToggleButton value={ false }>Регистрация</ToggleButton>
            </ToggleButtonGroup>
            { alignment ? <LoginForm/> : <RegForm/> }
        </div>

    );
};

export default Login;
