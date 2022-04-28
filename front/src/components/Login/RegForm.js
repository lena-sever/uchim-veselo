import { useState } from "react";
import { useDispatch, useSelector } from "react-redux";
import { useFormik } from "formik";
import * as yup from "yup";
import { useNavigate } from "react-router-dom";
import { FormControl } from "@mui/material";
import TextField from "@mui/material/TextField";
import { Button } from "@mui/material";
import { makeStyles } from "@material-ui/core/styles";
import { styled } from "@mui/material/styles";
import { purple } from "@mui/material/colors";

import { reghMe } from "../../store/auth/action";
import { selectUser } from "../../store/auth/authSelector";

const validationSchema = yup.object({
    name: yup
        .string("Введите свой email")
        .min(2, "Минимальная длина имени 2 символа")
        .required("Вы не ввели email"),
    email: yup
        .string("Введите свой email")
        .email("Email не корректный")
        .required("Вы не ввели email"),
    password: yup
        .string("Введите свой пароль")
        .min(7, "Минимальная длина пароля 6 символов")
        .required("Вы не ввели пароль"),
    confirmPassword: yup
        .string()
        .oneOf([yup.ref("password")], "Пароли не совпадают")
        .required("Обязательно"),
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

const RegForm = () => {
    const classes = useStyles();
    const dispatch = useDispatch();
    let navigate = useNavigate();
    const user = useSelector(selectUser);

    const formik = useFormik({
        initialValues: {
            name: "",
            email: "",
            password: "",
            confirmPassword: "",
        },
        validationSchema: validationSchema,
        onSubmit: async (values) => {
            dispatch(
                reghMe({ name: values.name ,email: values.email, password: values.password })
            );
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
                    id="name"
                    name="name"
                    label="Имя"
                    value={formik.values.name}
                    onChange={formik.handleChange}
                    error={formik.touched.name && Boolean(formik.errors.name)}
                    helperText={formik.touched.name && formik.errors.name}
                />
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
                    label="Пароль"
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
                <TextField
                    margin="normal"
                    fullWidth
                    id="confirmPassword"
                    name="confirmPassword"
                    label="Повторите пароль"
                    type="password"
                    value={formik.values.confirmPassword}
                    onChange={formik.handleChange}
                    error={
                        formik.touched.confirmPassword &&
                        Boolean(formik.errors.confirmPassword)
                    }
                    helperText={
                        formik.touched.confirmPassword &&
                        formik.errors.confirmPassword
                    }
                />
                <ColorButton
                    fullWidth
                    type="submit"
                    size="large"
                    className={classes.btn}
                >
                    Регистрация
                </ColorButton>
                {user.err && <p>{user.err}</p>}
            </div>
        </form>
    );
};

export default RegForm;
