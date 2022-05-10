import "./TestsImg.css";

function TestsImg({ src }) {
    return (
        <div className="test__img-wrap">
            <img className="test__img"
                 src={ src }
                 alt="Изображение изучаемого слова"/>
        </div>
    );
}

export default TestsImg;
