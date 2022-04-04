import { useState } from "react";
import { useDispatch, useSelector } from "react-redux";
import { reghMe } from "../../store/auth/action";
import { selectLogin } from "../../store/auth/authSelector";
import { useNavigate } from "react-router-dom";
import { FormControl } from "@mui/material";
import TextField from "@mui/material/TextField";
import { Button } from "@mui/material";
import { makeStyles } from "@material-ui/core/styles";
import { styled } from "@mui/material/styles";
import { purple } from "@mui/material/colors";

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

const RegForm = () => {
    const classes = useStyles();
    const dispatch = useDispatch();
    let navigate = useNavigate();
    const loginUser = useSelector(selectLogin);
    const [login, setLogin] = useState("");
    const [password, setPassword] = useState("");
    const [repeatPassword, setRepeatPassword] = useState("");
    const [error, setError] = useState("");

    if (loginUser) {
        navigate("/courses", { replace: true });
    }

    const submitForm = () => {
        if (password === repeatPassword) {
            dispatch(
                reghMe({
                    login: login,
                    password: password,
                })
            );
        }
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
                <TextField
                    required
                    error={password !== repeatPassword}
                    margin="normal"
                    id="outlined-password-input"
                    label="Повторите пароль"
                    type="password"
                    autoComplete="current-password"
                    value={repeatPassword}
                    helperText={
                        password !== repeatPassword ? "пароли не совпадают" : ""
                    }
                    onChange={(e) => {
                        setRepeatPassword(e.target.value);
                    }}
                />
                <ColorButton type="submit" size="large" className={classes.btn}>
                    Регистрация
                </ColorButton>
            </FormControl>
        </form>
    );
};

export default RegForm;
