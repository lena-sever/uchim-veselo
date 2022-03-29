import React from "react";
import Subscribe from "../Subscribe/Subscribe";
import "./InfoPage.css";
const InfoPage = () => {
    return (
        <section>
            <div class="header__content-wrp">
                <div class="header-title title">Учим весело</div>
                <div class="header-title__react subtitle">
                    Образовательная платформа для детей
                </div>
                <a class="try-btn" target="_blank" href="#">
                    Учиться
                </a>
            </div>
            <Subscribe />
        </section>
    );
};

export default InfoPage;
