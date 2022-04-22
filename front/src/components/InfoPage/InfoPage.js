import React from "react";
import Subscribe from "../Subscribe/Subscribe";
import "./InfoPage.css";
import { Link } from "react-router-dom";
import ReviewsContainer from "../Reviews/ReviewsContainer";
import bg2 from "../InfoPage/img/bg3.png";

const InfoPage = () => {
    return (
        <section>
            <div class="header__content-wrp">
                <div class="header-title title">Учим весело</div>
                <div class="header-title__react subtitle">
                    Образовательная платформа для детей
                </div>
                 
                <Link className="try-btn" to="/courses">
                    Учиться
                </Link>
                <img className="header_img" src={bg2}></img>
            </div>
            <ReviewsContainer />
            <Subscribe />
        </section>
    );
};

export default InfoPage;
