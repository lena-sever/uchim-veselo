import { useDispatch, useSelector } from "react-redux";
import { useNavigate } from "react-router-dom";
import { useFormik } from "formik";
import * as yup from "yup";
import TextField from "@mui/material/TextField";
import { Button } from "@mui/material";
import { makeStyles } from "@material-ui/core/styles";
import { styled } from "@mui/material/styles";
import { purple } from "@mui/material/colors";

import { login } from "../../store/auth/action";
import { selectUser } from "../../store/auth/authSelector";

const validationSchema = yup.object({
    email: yup
        .string("Введите свой email")
        .email("Email не корректный")
        .required("Вы не ввели email"),
    password: yup
        .string("Введите свой пароль")
        .min(6, "Минимальная длина пароля 6 символов")
        .required("Вы не ввели пароль"),
});

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
    const user = useSelector(selectUser);

    const formik = useFormik({
        initialValues: {
            email: "",
            password: "",
        },
        validationSchema: validationSchema,
        onSubmit: async (values) => {
            dispatch(login(values));
        },
    });

    if (user.id) {
        navigate("/courses", { replace: true });
    }

    return (
        <form onSubmit={formik.handleSubmit}>
            <div className="login__wrp">
                <TextField
                    margin="normal"
                    fullWidth
                    id="email"
                    name="email"
                    label="Email"
                    value={formik.values.email}
                    onChange={formik.handleChange}
                    error={formik.touched.email && Boolean(formik.errors.email)}
                    helperText={formik.touched.email && formik.errors.email}
                />
                <TextField
                    margin="normal"
                    fullWidth
                    id="password"
                    name="password"
                    label="Password"
                    type="password"
                    value={formik.values.password}
                    onChange={formik.handleChange}
                    error={
                        formik.touched.password &&
                        Boolean(formik.errors.password)
                    }
                    helperText={
                        formik.touched.password && formik.errors.password
                    }
                />
                <ColorButton
                    fullWidth
                    type="submit"
                    size="large"
                    className={classes.btn}
                >
                    Вход
                </ColorButton>
            </div>
            {user.err && <p>{user.err}</p>}
        </form>
    );
};

export default LoginForm;
