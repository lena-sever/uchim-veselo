import * as React from "react";

function Test2({ test, getTestsHandler }) {

    return (
        <section className="test">
            <h2 className="test__title ">Прочитайте значение слова:</h2>
            <div className='test__img-wrap'>
                <img className="test__img" src={test.src} alt="Изображение изучаемого слова"/>
            </div>
            <p><span className="test__word">{ test.word }</span> - { test.answer_5 }</p>
            <div className="test__bottom">
                <button className="test__btn"
                        onClick={ () => {
                            getTestsHandler( 3 );
                        } }
                >Далее
                </button>
            </div>
        </section>
    );
}

export default Test2;
