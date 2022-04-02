import { useState } from "react";
import { useDispatch, useSelector } from "react-redux";
import { useNavigate } from "react-router-dom";
import { FormControl } from "@mui/material";
import TextField from "@mui/material/TextField";
import { Button } from "@mui/material";
import { makeStyles } from "@material-ui/core/styles";
import { styled } from "@mui/material/styles";
import { purple } from "@mui/material/colors";

import { authMe } from "../../store/auth/action";
import { selectLogin } from "../../store/auth/authSelector";

const ColorButton = styled(Button)(({ theme }) => ({
    color: theme.palette.getContrastText(purple[500]),
    backgroundColor: purple[500],
    "&:hover": {
        backgroundColor: purple[700],
    },
}));

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

const LoginForm = () => {
    const classes = useStyles();
    const dispatch = useDispatch();
    const navigate = useNavigate();
    const loginUser = useSelector(selectLogin);
    const [login, setLogin] = useState("");
    const [password, setPassword] = useState("");

    if (loginUser) {
        navigate("/courses", { replace: true });
    }

    const submitForm = async () => {
        dispatch(
            authMe({
                login: login,
                password: password,
            })
        );
    };

    return (
        <form
            onSubmit={(e) => {
                e.preventDefault();
                submitForm();
            }}
        >
            <FormControl fullWidth margin="normal" className="login__wrp">
                <TextField
                    required
                    margin="normal"
                    id="outlined-required"
                    label="Логин"
                    value={login}
                    onChange={(e) => {
                        setLogin(e.target.value);
                    }}
                />
                <TextField
                    required
                    margin="normal"
                    id="outlined-password-input"
                    label="Пароль"
                    type="password"
                    autoComplete="current-password"
                    value={password}
                    onChange={(e) => {
                        setPassword(e.target.value);
                    }}
                />
                <ColorButton type="submit" size="large" className={classes.btn}>
                    Вход
                </ColorButton>
            </FormControl>
        </form>
    );
};

export default LoginForm;
