import "./ReviewForm.css";
import React from "react";
import { useDispatch } from "react-redux";
import { useFormik } from "formik";
import TextField from "@mui/material/TextField";
import * as yup from "yup";
import { addReviewTC } from "../../../store/reviews/actions";

const validationSchema = yup.object( {
    text: yup.string( "" ).required( "Обязательное поле для ввода" ),
} );
const style = {
    maxWidth: "350px",
    margin: "0 auto 10px",
};

const styleSubtext = {
    fontStyle: "italic",
};

const ReviewForm = (props) => {
    const dispatch = useDispatch();
    const formik = useFormik( {
        initialValues: {
            text: "",
        },
        validationSchema: validationSchema,
        onSubmit: (value, actions) => {
            let objReview = new Object();
            objReview.text = value.text;
            objReview.course_id = props.courseId;
            objReview.user_id = props.user.id;
            dispatch( addReviewTC( objReview ) );
            actions.resetForm( { value: "" } );
        },
    } );

    return (
        <div>
            <h2>Оставить отзыв</h2>
            <p style={ styleSubtext }>Только для зарегистрированных пользователей</p>
            <form onSubmit={ formik.handleSubmit }>
                <div style={ style }>
                    <TextField
                        fullWidth
                        id="text"
                        label="Напишите свой отзыв"
                        multiline
                        rows={ 4 }
                        value={ formik.values.text }
                        onChange={ formik.handleChange }
                        error={ formik.errors.text }
                        helperText={ formik.errors.text }
                    />
                    <button type="submit" className="review-form__btn">Отправить</button>
                </div>
            </form>
        </div>
    );
};

export default ReviewForm;
