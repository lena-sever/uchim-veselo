import { Button } from "@mui/material";
import { NavLink } from "react-router-dom";
import { makeStyles } from "@material-ui/core/styles";
import { styled } from "@mui/material/styles";
import { purple, common } from "@mui/material/colors";


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


function CoursesItem({ course }) {
    const classes = useStyles();
    const path = `/courses/${course.id}`;
    const getId = () => {
        console.log(course.id);
    };
    return (
        <div class="products_item">
            <NavLink to={path} class="products_item_img">
                <img
                    class="products_item_img_w"
                    src={course.img}
                    alt="product_photo"
                ></img>
            </NavLink>
            <div class="products_item_text_box">
                <p class="text_box_header">{course.title}</p>
                <p class="text_box_main">{course.text}</p>
            </div>
            <ColorButtonOutlined
                as={NavLink}
                to={path}
                size="small"
                onClick={getId}
                className={`products_item_btn ${classes.btn}`}
            >
                НАЧАТЬ УЧИТЬСЯ
            </ColorButtonOutlined>
        </div>
    );
}

export default CoursesItem;
