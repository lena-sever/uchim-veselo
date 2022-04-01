import React from "react";
import { FormControl } from "@mui/material";
import TextField from "@mui/material/TextField";
import { Button } from "@mui/material";
import ToggleButton from "@mui/material/ToggleButton";
import ToggleButtonGroup from "@mui/material/ToggleButtonGroup";
import { makeStyles } from "@material-ui/core/styles";
import { styled } from "@mui/material/styles";
import { purple } from "@mui/material/colors";
import "./Login.css";
import LoginForm from "./LoginForm";

const useStyles = makeStyles((theme) => ({
    btn: {
        textDecoration: "none",
        textTransform: "uppercase",
        borderRadius: "5px",
        border: "1px solid #b458bf",
    },
    btnGroup: {
        display: "block",
    },
}));

const ColorButton = styled(Button)(({ theme }) => ({
    color: theme.palette.getContrastText(purple[500]),
    backgroundColor: purple[500],
    "&:hover": {
        backgroundColor: purple[700],
    },
}));

const Login = () => {
    const [alignment, setAlignment] = React.useState(true);
    const handleChange = (event, newAlignment) => {
        if (newAlignment !== null) {
            setAlignment(newAlignment);
        }
    };
    const classes = useStyles();
    return (
        <div>
            <h1 className="title">Login</h1>
            <ToggleButtonGroup
                color="primary"
                value={alignment}
                exclusive
                onChange={handleChange}
                className={classes.btnGroup}
            >
                <ToggleButton value={true}>Вход</ToggleButton>
                <ToggleButton value={false}>Регистрация</ToggleButton>
            </ToggleButtonGroup>
            {alignment ? <LoginForm/> : <></>}
        </div>
    );
};

export default Login;
