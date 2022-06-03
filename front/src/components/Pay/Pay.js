import "./Pay.css";
import ButtonBackToComics from "../ButtonBackToСomics/ButtonBackToСomics";
import React from "react";
import { NavLink } from "react-router-dom";

function Pay() {
    return (
        <section className="pay">
            <h1 className="pay__title">Оплатить комикс</h1>
            <p className="pay__text">
                <NavLink to="/contacts" className="pay__link">Напишите нам</NavLink>,
                и мы с Вами свяжемся
            </p>
            <ButtonBackToComics path="/courses" text="Другие комиксы" color="secondary"/>
        </section>
    );
}

export default Pay;
