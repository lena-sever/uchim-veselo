import React from "react";
import Subscribe from "../Subscribe/Subscribe";
import "./InfoPage.css";
import { Link } from "react-router-dom";
import ReviewsContainer from "../Reviews/ReviewsContainer";
import bg2 from "../InfoPage/img/bg3.png";
import ControlledCarousel from '../CarouselMain/CarouselMain';

const InfoPage = () => {
    return (
        <section>
            <  ControlledCarousel className="carousel"/>
                             
            <div className="mainTextWrp">
                <div className="mainText-head">Дорогие родители!</div>
                <p className="mainText">  Этот сайт - уникальная образовательная платформа для ваших детей. Они смогут сочетать любимое занятие, в виде просмотра комиксов, с чтением книг и улучшением знания слов.
                </p>
                <p className="mainText">Если ребёнок не понимает значения слов, то он не сможет хорошо учиться. Эти умные комиксы привьют вашему ребёнку любовь к обучению, правильному обращению со словами и навыкам самому разбираться с непонятым словом. </p>

                <p className="mainText">Мы хотим, чтобы ваш ребёнок, как и все остальные дети, полюбили чтение и обучение, потому что эти занятия дадут им возможность улучшить своё образование, заняться самообразованием и достичь всех своих целей в жизни.</p>
            </div>
            <Link className="try-btn" to="/courses">
                    Начать
                </Link>
            <ReviewsContainer />
            <Subscribe />
        </section>
    );
};

export default InfoPage;
