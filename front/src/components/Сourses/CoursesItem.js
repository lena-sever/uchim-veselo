import { Button } from "@mui/material";
import { NavLink } from "react-router-dom";

function CoursesItem({ course }) {
    const getId = () => {
        console.log(course.id);
    };
    return (
        <div class="products_item">
            <a href="product.html" class="products_item_img">
                <img
                    class="products_item_img_w"
                    src={course.img}
                    alt="product_photo"
                ></img>
            </a>
            <div class="products_item_text_box">
                <p class="text_box_header">{course.title}</p>
                <p class="text_box_main">{course.text}</p>
            </div>
            <Button
                as={NavLink}
                to={course.id}
                size="small"
                color="primary"
                onClick={getId}
                className="products_item_btn txt"
            >
                НАЧАТЬ УЧИТЬСЯ
            </Button>
        </div>
    );
}

export default CoursesItem;
