import * as React from "react";

function Test3({ test, getTestsHandler }) {

    return (
        <section className="test">
            <h2 className="test__title ">Объясните, что такое <span className="test__word">{ test.word }</span>,
                правильно выбирая слова из скобок: </h2>
            <div className='test__img-wrap'>
                <img className="test__img" src="https://kartinkin.net/uploads/posts/2021-07/thumbs/1626777553_7-kartinkin-com-p-nitki-fon-krasivo-7.jpg" alt="Изображение изучаемого слова"/>
            </div>
            <p><span className="test__word">{ test.word }</span> - это (тонкая или широкая) длинная (змея или
                веревочка), с помощью которой делали (ткань или помидоры), шили (автомобиль или одежду)</p>
            <div className="test__bottom">
                <button
                    className="test__btn"
                    onClick={ () => {
                        getTestsHandler( 4 );
                    } }
                >Далее
                </button>
            </div>
        </section>
    );
}

export default Test3;
