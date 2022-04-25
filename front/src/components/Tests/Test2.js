function Test2({ test, getTestsHandler }) {

    return (
        <>
            <p>Прочитайте значение слова:</p>
            <p>{ test.word } - { test.answer_5 }</p>

            <button
                onClick={ () => {
                    getTestsHandler( 3 );
                } }
            >Далее
            </button>
        </>
    );
}

export default Test2;
