import "./Courses.css";
import { NavLink } from "react-router-dom";
import { Button } from "@mui/material";
import { getLessons } from "../../store/lessons/actions";
import { useDispatch, useSelector } from "react-redux";
import { makeStyles } from "@material-ui/core/styles";
import { styled } from "@mui/material/styles";
import { purple, } from "@mui/material/colors";

import { selectUser } from "../../store/auth/authSelector";
import { ReactComponent as HeartImg } from "../../img/heart.svg";
// import img from "../../img/heart.svg";
import { addLikeComics } from "../../store/courses/actions";
// import { authMe } from "../../store/auth/action";
import { useEffect, useState } from "react";
// import { selectLikes } from "../../store/likes/likesSelector";

const useStyles = makeStyles( (theme) => ( {
    btn: {
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

function CoursesItem({ course,filter }) {
    // const userCourses = useSelector( selectUser );
    // console.log( userCourses );
    const classes = useStyles();
    const pathCourse = `/courses/${ course.id }`;
    const pathPay = "/pay";
    const pathAuthor = `/author/${ course.author_id }`;
    const pathPainter = `/painter/${ course.painter_id }`;
    const dispatch = useDispatch();
    const [ message, setMessage ] = useState( false );
    const user = useSelector( selectUser );
    console.log(user);
    const [ isLike, setLike ] = useState( 0);  //  Изменение цвета сердечка в зависимости от лайка
    const heartClass = user.id !== "" ? filter== "All" ? isLike  ? ( "products_icon-heart_active products_icon-heart" ) : ( "products_icon-heart" ) : ( "products_icon-heart" ) : ( "products_icon-heart" ) // Класс для изменения сердечка

    const getLessonsList = () => {
        dispatch( getLessons( course.id ) );
    };

    useEffect( () => {
        // const ob = userCourses.length > 0  ? userCourses.course.filter( val => val.course_id == course.id ) : [];
        // const like = ob.length > 0  ? ob[0].like : 0 ;
        if(user.course){
            const ob = user.course.filter( val => val.course_id == course.id ) || [];
            const like = ob[ 0 ] ? ob[ 0 ].like : 0;

            setLike( like );
        }
        return null

    }, [ user ] );

    console.log( isLike );

    // MARK

    // console.log( user );

    // MARK
    // const click = () => {
    //     let obj = new Object();
    //     obj.course_id = course.id;
    //     obj.user_id = user.id;
    //     // debugger;
    //     addLikeComics( obj );
    // };

    // const proverka = () => {
    //     let id = [];
    //     userCourses.course.filter( (item) => {
    //         if( item.course_id == course.id && item.like == 1 ) {
    //             id.push( item.course_id );
    //         }
    //     } );
    //
    //     return id.includes( course.id ) || course.like == 1 ? yesLike : notLike;
    // };

    // const notLike = {
    //     filter: "grayscale(1)",
    //     width: "30px",
    // };

    // const yesLike = {
    //     filter: "none",
    //     width: "30px",
    // };

    const handleToggleLike = async () => {

        if( user.id == "" ) {
            setMessage( true );
            setTimeout( () => {
                setMessage( false );
            }, 2000 );

        }
        setLike( isLike==0 ? 1 : 0 );
        await addLikeComics( { course_id: course.id, user_id: user.id } ) ;

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
            <ColorButtonOutlined
                as={ NavLink }
                to={ pathCourse }
                size="small"
                onClick={ getLessonsList }
                className={ `products_item_btn ${ classes.btn }` }
            >
                ПОДРОБНЕЕ
            </ColorButtonOutlined>
            <ColorButtonOutlined
                as={NavLink}
                to={pathPay}
                size="small"
                onClick={getLessonsList}
                className={`products_item_btn ${classes.btn}`}
            >
                КУПИТЬ
            </ColorButtonOutlined>

            <div className="products_icon-heart-wrap">
                <HeartImg
                    className={ heartClass }
                    onClick={ handleToggleLike }/>

            </div>
            <p className="products__error">{ message ? "Войдите или зарегистрируйтесь" : "" }</p>
        </div>
    );
}

export default CoursesItem;
