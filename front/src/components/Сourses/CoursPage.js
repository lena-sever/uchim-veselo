import React from "react";
import { useDispatch, useSelector } from "react-redux";
import { useParams } from "react-router-dom";
import { Button } from "@mui/material";

import { NavLink } from "react-router-dom";
import { makeStyles } from "@material-ui/core/styles";
import { styled } from "@mui/material/styles";

import { selectReview, selectError } from "../../store/reviews/reviewsSelector";
import { green, common } from "@mui/material/colors";
import { getCours, getCourses } from "../../store/courses/actions";
import {
    selectCours,
    selectCourses,
} from "../../store/courses/coursesSelectors";
import { getReviewTC } from "../../store/reviews/actions";
import LessonReview from "../Lessons/LessonReview/LessonReview";
import "./Cours.css";

import ReviewForm from "../Lessons/ReviewForm/ReviewForm";
import { selectUser } from "../../store/auth/authSelector";

import { getCourseId } from "../../store/courseId/actions";
import ButtonBackToComics from "../ButtonBackToСomics/ButtonBackToСomics";

const useStyles = makeStyles( (theme) => ( {
    btn: {
        margin: theme.spacing( 2 ),
        textDecoration: "none",
        textTransform: "uppercase",
        borderRadius: "5px",
        padding: "10px 20px",
        border: "1px solid #b458bf",
    },
} ) );

const ColorButton = styled( Button )( ({ theme }) => ( {
    // color: theme.palette.getContrastText( green[ 500 ] ),
    color: "#ffffff",
    backgroundColor: green[ 500 ],
    "&:hover": {
        color: "#efe405",
        backgroundColor: green[ 700 ],
    },
} ) );

const ColorButtonOutlined = styled( Button )( ({ theme }) => ( {
    color: green[ 500 ],
    backgroundColor: common.white,
    "&:hover": {
        color: theme.palette.getContrastText( green[ 100 ] ),
        backgroundColor: green[ 100 ],
    },
} ) );

const CoursPage = () => {
    const classes = useStyles();
    const dispatch = useDispatch();
    const courses = useSelector( selectCourses );
    const requestCours = async(courseId) => {
        await dispatch( getCourses() );
        await dispatch( getCours( courseId ) );
    };
    const cours = useSelector( selectCours );
    console.log( courses );
    console.log( cours );
    const reviewCourse = useSelector( selectReview );
    let { courseId } = useParams();
    const pathAuthor = `/author/${ cours.author_id }`;
    const pathPainter = `/painter/${ cours.painter_id }`;
    const requestReview = async(courseId) => {
        dispatch( getReviewTC( courseId ) );
    };
    React.useEffect( () => {
        console.log( courseId );
        requestCours( courseId );
        requestReview( courseId );
        dispatch( getCourseId( courseId ) );
    }, [] );

    const user = useSelector( selectUser );

    let reviewElem = reviewCourse.map( (review) => {
        return <LessonReview key={ review.id } review={ review }/>;
    } );
    const style = {
        maxWidth: "1249px",
        margin: "0 auto",
    };

    return courses.length > parseInt( courseId - 1 ) ? (

        <div className="cours__wrp">
            { cours && (
                <>
                    <h1 className="title">{ cours.title }</h1>
                    <img className="cours__img" src={ cours.img }/>
                    {/*<h2 className="subtitle">{ cours.description }</h2>*/ }

                    <p className="products_item__author">Автор:
                        <NavLink to={ pathAuthor } className="products_item__author">
                            <span className="text_box_main ">{ cours.name_author }</span>
                        </NavLink>
                    </p>
                    <p>Художник:
                        <NavLink to={ pathPainter } className="products_item__author">
                            <span className="text_box_main ">{ cours.name_painter }</span>
                        </NavLink>
                    </p>
                    <p className="text_box_main cours__text">{ cours.description }</p>
                    <div className="cours__btn-wrp">
                        <ColorButton
                            as={ NavLink }
                            to={ `/courses/${ courseId }/slider1` }
                            size="large"
                            className={ classes.btn }
                        >
                            Начать читать комикс
                        </ColorButton>

                        <ButtonBackToComics path="/courses" text='Другие комиксы' />
                        {/*<ColorButtonOutlined*/}
                        {/*    as={ NavLink }*/}
                        {/*    className={ classes.btn }*/}
                        {/*    to="/courses"*/}
                        {/*    size="large"*/}
                        {/*>*/}
                        {/*    Другие комиксы*/}
                        {/*</ColorButtonOutlined>*/}
                    </div>
                    <div className="cours__reviews">
                        <ReviewForm
                            user={ user }
                            courseId={ courseId }
                        ></ReviewForm>
                        <h3 className="cours__reviews-title">Отзывы</h3>
                    </div>
                    <div style={ style }>{ reviewElem }</div>
                </>
            ) }
        </div>

    ) : (
        <ColorButtonOutlined
            as={ NavLink }
            className={ classes.btn }
            to="/courses"
            size="large"
        >
            Другие комиксы
        </ColorButtonOutlined>
    );
};

export default CoursPage;
