import React from "react";
import Subscribe from "../Subscribe/Subscribe";
import "./InfoPage.css";
import { Link } from "react-router-dom";
import ReviewsContainer from "../Reviews/ReviewsContainer";
import bg2 from "../InfoPage/img/bg3.png";

const InfoPage = () => {
    return (
        <section>
            <div className="header__content-wrp">
                <div className="header-title title">СмартКомикс</div>
                <div className="header-title__react subtitle">
                Наши комиксы помогут вашему ребенку легче учиться, быстрее разбираться с чем-то новым
                </div>

                <Link className="try-btn" to="/courses">
                    Начать
                </Link>
                <img className="header_img" src={bg2}></img>
            </div>
            <ReviewsContainer />
            <Subscribe />
        </section>
    );
};

export default InfoPage;
