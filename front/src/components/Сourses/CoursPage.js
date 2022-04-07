import React from "react";
import { useDispatch, useSelector } from "react-redux";
import { useParams } from "react-router-dom";
import { Button } from "@mui/material";

import { NavLink } from "react-router-dom";
import { makeStyles } from "@material-ui/core/styles";
import { styled } from "@mui/material/styles";


import { purple, common } from "@mui/material/colors";
import { getCours } from "../../store/courses/actions";
import { selectCours } from "../../store/courses/coursesSelectors";

import "./Cours.css";

const useStyles = makeStyles((theme) => ({
    btn: {
        margin: theme.spacing(2),
        textDecoration: "none",
        textTransform: "uppercase",
        borderRadius: "5px",
        padding: "10px 20px",
        border: "1px solid #b458bf",
    },
}));

const ColorButton = styled(Button)(({ theme }) => ({
    color: theme.palette.getContrastText(purple[500]),
    backgroundColor: purple[500],
    "&:hover": {
        backgroundColor: purple[700],
    },
}));

const ColorButtonOutlined = styled(Button)(({ theme }) => ({
    color: purple[500],
    backgroundColor: common.white,
    "&:hover": {
        color: theme.palette.getContrastText(purple[100]),
        backgroundColor: purple[100],
    },
}));

const CoursPage = () => {
    const classes = useStyles();
    const dispatch = useDispatch();
    const requestCours = async (coursId) => {
        await dispatch(getCours(coursId));
    };
    const cours = useSelector(selectCours);
    let { coursId } = useParams();
    React.useEffect(() => {
        requestCours(coursId);
    }, []);
    return (
        <div className="cours__wrp">
            {cours && (
                <>
                    <h1 className="title">{cours.title}</h1>
                    <img className="cours__img" src={cours.img} />
                    <h2 className="subtitle">{cours.description}</h2>
                    <p className="text_box_main cours__text">{cours.text}</p>
                    <div className="cours__btn-wrp">
                        <ColorButton
                            as={NavLink}
                            to="/"
                            size="large"
                            className={classes.btn}
                        >
                            Начать курс
                        </ColorButton>

                        <ColorButtonOutlined
                            as={NavLink}
                            className={classes.btn}
                            to="/courses"
                            size="large"
                        >
                            Другие курсы
                        </ColorButtonOutlined>
                    </div>
                </>
            )}
        </div>
    );
};

export default CoursPage;
