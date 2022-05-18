import "./Search.css";
import { useEffect, useState } from "react";
import { useDispatch, } from "react-redux";
import { ReactComponent as SearchImg } from "./img/search_icon.svg";
import { ReactComponent as CloseImg } from "./img/close_icon.svg";
import { getResultFound } from "../../store/resultFound/actions";
import { useNavigate } from "react-router-dom";
import { getSearchWord } from "../../store/searchWord/actions";

function Search() {
    const [ searchWord, setSearchWord ] = useState( "" );
    const [ isError, setError ] = useState( false );
    const [ isSmall, setSmall ] = useState( true );
    const dispatch = useDispatch();
    const navigate = useNavigate();
    // const [ windowDimenion, setWindowDimenio ] = useState( {
    //     winWidth: window.innerWidth,
    //     winHeight: window.innerHeight,
    // } );

    const handleSearch = (e) => {
        e.preventDefault();

        if( searchWord.length < 3 ) {
            setError( true );
            const timeout = setTimeout( () => {
                setError( false );
            }, 2000 );
            // return clearTimeout( timeout );

        } else {
            dispatch( getSearchWord( searchWord ) );
            dispatch( getResultFound( searchWord ) );
            navigate( "/foundResult", { replace: true } );
        }

    };

    const handleChangeSearchWord = (e) => {
        setSearchWord( e.target.value );
    };

    const handleDeleteWord = () => {
        setSearchWord( "" );
    };

    // Определяем размер окна браузера
    // const detectSize = () => {
    //     setWindowDimenio( {
    //         winWidth: window.innerWidth,
    //         winHeight: window.innerHeight,
    //     } );
    // };

    // // Определяем размер окна браузера
    // useEffect( () => {
    //     window.addEventListener( "resize", detectSize );

    //     if(windowDimenion.winWidth > 768){
    //         setSmall(false)
    //     }
    // }, [ windowDimenion ] );



    return (
        <>
            <form action=""
                  className="search"
                  onSubmit={ handleSearch }
            >
                <input
                    type="text"
                    name="search_phrase"
                    value={ searchWord }
                    placeholder={  "Комикс, автор, художник"}
                    className="search__input"
                    onChange={ handleChangeSearchWord }
                />
                <button
                    onClick={ handleDeleteWord }
                    type="button"
                    className="search__close"
                >
                    <CloseImg className="close__icon"/>
                </button>
                <button
                    type="submit"
                    className="search__btn"
                >
                    <SearchImg className="search__icon"/>
                </button>
                { isError  && <p className="search__error">Нужно ввести больше 3 символов</p> }
            </form>
        </>
    );
}

export default Search;
