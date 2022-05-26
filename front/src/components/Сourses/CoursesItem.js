import "./Courses.css";
import { NavLink } from "react-router-dom";
import { Button } from "@mui/material";
import { getLessons } from "../../store/lessons/actions";
import { useDispatch, useSelector } from "react-redux";
import { makeStyles } from "@material-ui/core/styles";
import { styled } from "@mui/material/styles";
import { purple, common } from "@mui/material/colors";

import { selectUser } from "../../store/auth/authSelector";
import img from "../../img/gui_like_icon_157110.png";
import { addLikeComics } from "../../store/courses/actions";
import { authMe } from "../../store/auth/action";

const useStyles = makeStyles((theme) => ({
    btn: {
        textDecoration: "none",
        textTransform: "uppercase",
        borderRadius: "5px",
        padding: "10px 20px",
        border: "1px solid #b458bf",
    },
}));

const ColorButtonOutlined = styled(Button)(({ theme }) => ({
    color: theme.palette.getContrastText(purple[300]),
    backgroundColor: purple[300],
    "&:hover": {
        color: theme.palette.getContrastText(purple[100]),
        backgroundColor: purple[100],
    },
}));

function CoursesItem({ course, coursesMe, filter }) {
    // debugger;
    const classes = useStyles();
    const path = `/courses/${course.id}`;
    const pathAuthor = `/author/${course.author_id}`;
    const pathPainter = `/painter/${course.painter_id}`;
    const dispatch = useDispatch();

    const getLessonsList = () => {
        dispatch(getLessons(course.id));
    };
    // MARK
    const userId = useSelector(selectUser);

    // MARK
    const click = () => {
        debugger;
        let obj = new Object();
        if (filter == "All") {
            obj.course_id = course.id;
        } else obj.course_id = course.course_id;

        obj.user_id = userId.id;
        addLikeComics(obj);
    };

    const proverka = () => {
        let id = [];
        coursesMe.course.filter((item) => {
            if (item.course_id == course.id && item.like == 1) {
                id.push(item.course_id);
            }
        });

        return id.includes(course.id) || course.like == 1 ? yesLike : notLike;
    };

    const notLike = {
        filter: "grayscale(1)",
        width: "30px",
    };

    const yesLike = {
        filter: "none",
        width: "30px",
    };

    return (
        <div className="products_item">
            <NavLink
                to={path}
                className="products_item_img"
                onClick={getLessonsList}
            >
                <img
                    className="products_item_img_w"
                    src={course.img}
                    alt="product_photo"
                />
            </NavLink>
            <div className="products_item_text_box">
                <p className="text_box_header">{course.title}</p>

                <p className="products_item__author">
                    Автор:
                    <NavLink to={pathAuthor} className="products_item__author">
                        <span className="text_box_main ">
                            {course.name_author}
                        </span>
                    </NavLink>
                </p>
                <p>
                    Художник:
                    <NavLink to={pathPainter} className="products_item__author">
                        <span className="text_box_main ">
                            {course.name_painter}
                        </span>
                    </NavLink>
                </p>
                <p className="text_box_main">{course.description}</p>
            </div>
            <ColorButtonOutlined
                as={NavLink}
                to={path}
                size="small"
                onClick={getLessonsList}
                className={`products_item_btn ${classes.btn}`}
            >
                ПОДРОБНЕЕ
            </ColorButtonOutlined>

            <div>
                <img onClick={click} src={img} style={proverka()}></img>
            </div>
        </div>
    );
}

export default CoursesItem;
