import React from "react";
import { FormControl } from "@mui/material";
import TextField from "@mui/material/TextField";
import { Button } from "@mui/material";
import { makeStyles } from "@material-ui/core/styles";
import { styled } from "@mui/material/styles";
import { purple } from "@mui/material/colors";

import './Login.css';


const useStyles = makeStyles((theme) => ({
    btn: {
        margin: theme.spacing(2),
        textDecoration: "none",
        textTransform: "uppercase",
        borderRadius: "5px",
        border: "1px solid #b458bf",
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
    const classes = useStyles()
    return (
        <div>
            <h1 className="title">Login</h1>
            <FormControl fullWidth margin="normal" className="login__wrp">
                <TextField
                    required
                    margin="normal"
                    id="outlined-required"
                    label="Login"
                    defaultValue="Hello World"
                />
                <TextField
                    required
                    margin="normal"
                    id="outlined-password-input"
                    label="Password"
                    type="password"
                    autoComplete="current-password"
                />
                <ColorButton
                    type="submit"
                    size="large"
                    className={classes.btn}
                >
                    Начать курс
                </ColorButton>
            </FormControl>
        </div>
    );
};

export default Login;
