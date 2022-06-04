import "./Courses.css";
import { NavLink } from "react-router-dom";
import { Button } from "@mui/material";
import { getLessons } from "../../store/lessons/actions";
import { useDispatch, useSelector } from "react-redux";
import { makeStyles } from "@material-ui/core/styles";
import { styled } from "@mui/material/styles";
import { purple, } from "@mui/material/colors";
import { selectUser, selectUserCourses } from "../../store/auth/authSelector";
import { ReactComponent as HeartImg } from "../../img/heart.svg";
import { addLikeComics } from "../../store/courses/actions";
import { useState } from "react";
import { toggleLike } from "../../store/auth/action";


const useStyles = makeStyles( (theme) => ( {
    btn: {
        fontSize: "12px",
        lineHeight: 1.1,
        textDecoration: "none",
        textTransform: "uppercase",
        borderRadius: "5px",
        padding: "10px 20px",
        border: "1px solid #b458bf",
    },
} ) );

const ColorButtonOutlined = styled( Button )( ({ theme }) => ( {
    color: theme.palette.getContrastText( purple[ 300 ] ),
    backgroundColor: purple[ 300 ],
    "&:hover": {
        color: theme.palette.getContrastText( purple[ 100 ] ),
        backgroundColor: purple[ 100 ],
    },
} ) );

function CoursesItem({ course, filter }) {
    const classes = useStyles();
    const pathCourse = `/courses/${ course.id }`;
    const pathPay = "/pay";
    const pathAuthor = `/author/${ course.author_id }`;
    const pathPainter = `/painter/${ course.painter_id }`;
    const dispatch = useDispatch();
    const [ message, setMessage ] = useState( false );
    const user = useSelector( selectUser );
    const isLike = useSelector( selectUserCourses ).find( item => {   //  Изменение лайка
        return item.course_id === course.id;
    } )?.like;

    const heartClass = user.id !== "" ? filter == "All" ? isLike ? ( "products_icon-heart_active products_icon-heart" ) : ( "products_icon-heart" ) : ( "products_icon-heart" ) : ( "products_icon-heart" ); // Класс для изменения сердечка

    const getLessonsList = () => {
        dispatch( getLessons( course.id ) );
    };

    const handleToggleLike = async() => {

        if( user.id == "" ) {
            setMessage( true );
            setTimeout( () => {
                setMessage( false );
            }, 2000 );
        }
        if( user.id && filter === "All" ) {
            await addLikeComics( { course_id: course.id, user_id: user.id } );
            dispatch( toggleLike( course.id ) );

        } else if( user.id && filter === "Like" ) {
            await addLikeComics( { course_id: course.course_id, user_id: user.id } );
            dispatch( toggleLike( course.course_id ) );
        }
    };


    return (
        <div className="products_item">
            <NavLink
                to={ pathCourse }
                className="products_item_img"
                onClick={ getLessonsList }
            >
                <img
                    className="products_item_img_w"
                    src={ course.img }
                    alt="product_photo"
                />
            </NavLink>
            <div className="products_item_text_box">
                <p className="text_box_header">{ course.title }</p>

                <p className="products_item__author">
                    Автор:
                    <NavLink to={ pathAuthor } className="products_item__author">
                        <span className="text_box_main ">
                            { course.name_author }
                        </span>
                    </NavLink>
                </p>
                <p>
                    Художник:
                    <NavLink to={ pathPainter } className="products_item__author">
                        <span className="text_box_main ">
                            { course.name_painter }
                        </span>
                    </NavLink>
                </p>
                <p className="text_box_main">{ course.description }</p>
            </div>
            <div className="products_item_btn-wrap">
                <ColorButtonOutlined
                    as={ NavLink }
                    to={ pathCourse }
                    size="small"
                    onClick={ getLessonsList }
                    className={ classes.btn }
                >
                    ПОДРОБНЕЕ
                </ColorButtonOutlined>
                <ColorButtonOutlined
                    as={ NavLink }
                    to={ pathPay }
                    size="small"
                    onClick={ getLessonsList }
                    className={ classes.btn }
                >
                    КУПИТЬ
                </ColorButtonOutlined>
            </div>

            <div className="products_icon-heart-wrap">
                <HeartImg
                    title={ isLike ? ( "Удалить из Избранного" ) : ( "Добавить в Избранное" ) }
                    className={ heartClass }
                    onClick={ handleToggleLike }/>

            </div>
            <p className="products__error">{ message ? "Войдите или зарегистрируйтесь" : "" }</p>
        </div>
    );
}

export default CoursesItem;
