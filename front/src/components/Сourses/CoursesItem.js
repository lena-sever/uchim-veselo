import { NavLink } from "react-router-dom";
import { getLessons } from "../../store/lessons/actions";
import { useDispatch } from "react-redux";


function CoursesItem({ course }) {
    const dispatch = useDispatch();

    const getLessonsList = () => {
        dispatch( getLessons( course.id ) );
    };

    return (
        <div className="products_item">
            <NavLink
                to={ `/courses/${ course.id }` }
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
                <p className="text_box_main">{ course.text }</p>
            </div>
            <NavLink
                to={ `/courses/${ course.id }` }
                size="small"
                color="primary"
                onClick={ getLessonsList }
                className="products_item_btn txt"
            >
                НАЧАТЬ УЧИТЬСЯ
            </NavLink>
        </div>
    );
}

export default CoursesItem;
