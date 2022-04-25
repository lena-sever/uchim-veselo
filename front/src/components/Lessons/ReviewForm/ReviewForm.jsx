import React from "react";
import { useDispatch } from "react-redux";
import { useFormik } from "formik";
import TextField from "@mui/material/TextField";
import * as yup from "yup";
import { addReviewTC } from "../../../store/reviews/actions";

const validationSchema = yup.object({
    text: yup.string("").required("Обязательное поле для ввода"),
});
const style = {
    maxWidth: "350px",
    margin: "0 auto 10px",
};
const style_btn = {
    // display: "block",
};

const ReviewForm = (props) => {
    const dispatch = useDispatch();
    const formik = useFormik({
        initialValues: {
            text: "",
        },
        validationSchema: validationSchema,
        onSubmit: (value) => {
            function getRandomId(min, max) {
                return Math.floor(Math.random() * (max - min + 1)) + min;
            }
            let objReview = new Object();
            objReview.text = value.text;
            objReview.course_id = props.courseId;
            objReview.user_id = getRandomId(100, 200);
            debugger;
            dispatch(addReviewTC(objReview));
        },
    });

    return (
        <div>
            <h2>Оставить отзыв</h2>
            <form onSubmit={formik.handleSubmit}>
                <div style={style}>
                    <TextField
                        fullWidth
                        id="text"
                        label="Напишите свой отзыв"
                        multiline
                        rows={4}
                        value={formik.values.text}
                        onChange={formik.handleChange}
                        error={formik.errors.text}
                        helperText={formik.errors.text}
                    />
                    <button style={style_btn} type="submit">
                        Отправить
                    </button>
                </div>
            </form>
        </div>
    );
};

export default ReviewForm;
