import React from "react";
import Subscribe from "../Subscribe/Subscribe";
import "./InfoPage.css";
import { Link } from "react-router-dom";

const InfoPage = () => {
    return (
        <section>
            <div class="header__content-wrp">
                <div class="header-title">Учим весело</div>
                <div class="header-title__react">
                    Образовательная платформа для детей
                </div>
                <Link className="try-btn" to="/courses">
                    Учиться
                </Link>
            </div>
            <Subscribe />
        </section>
    );
};

export default InfoPage;
