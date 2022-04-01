
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

const LoginForm = () => {
    const classes = useStyles();
return (
    <div>
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
            <ColorButton type="submit" size="large" className={classes.btn}>
                Вход
            </ColorButton>
        </FormControl>
    </div>
);
}

export default LoginForm;
