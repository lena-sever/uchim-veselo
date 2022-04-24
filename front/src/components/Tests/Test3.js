function Test3({ test,getTestsHandler }) {

    return (
        <>
            <h4>Объясните, что такое { test.word }, правильно выбирая слова из скобок: </h4>
            <button
                onClick={ () => {
                    getTestsHandler( 4 );
                } }
            >Далее
            </button>
        </>
    );
}

export default Test3;
