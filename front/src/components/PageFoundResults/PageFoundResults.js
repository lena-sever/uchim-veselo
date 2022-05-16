import "./PageFoundResults.css";
import { useSelector } from "react-redux";
import {
    selectResultFound,
    selectResultFoundError,
    selectResultFoundLoading
} from "../../store/resultFound/resultFoundSelector";
import CircularProgress from "../curcularProgress/CircularProgress";
import * as React from "react";
import { NavLink } from "react-router-dom";
import { useCallback } from "react";
import Highlighting from "./Highlighting";
import { selectSearchWord } from "../../store/searchWord/searchWordSelector";

function PageFoundResults() {
    const searchWord = useSelector( selectSearchWord );
    const isLoading = useSelector( selectResultFoundLoading );
    const error = useSelector( selectResultFoundError );
    const data = useSelector( selectResultFound );

    const highlightTheWord = useCallback( (str) => {
            return <Highlighting str={ str }/>;
        }, [ searchWord ]
    );

    return (
        <section className="page-found">
            <h1>Результаты поиска :</h1>

            {
                isLoading ? (
                    <CircularProgress/>
                ) : error ? (
                    <>{ !!error && <h3>{ error }</h3> }</>
                ) : data ? data.length == 0 ? (
                    <p>Ничего не найдено</p>
                ) : (
                    data.map( (item) => {

                            return (
                                <div className="page-found__result" key={ item.id }>
                                    <img className="page-found__img" src={ item.img } alt=""/>
                                    <p className="page-found__author">Автор: <span className="page-found__author-name">Лермонтов
                                        { highlightTheWord(item.author) }
                                    </span></p>
                                    <p className="page-found__painter">Художник: <span className="page-found__painter-name">Кукрыниксы
                                        { highlightTheWord(item.painter) }
                                    </span></p>
                                    <h3 className="page-found__title">
                                        <NavLink to={ `/courses/${ item.id }` }
                                                 className="page-found__link">{ highlightTheWord(item.title) }</NavLink>
                                    </h3>
                                    <p className="page-found__text">{ highlightTheWord(item.description) }</p>
                                </div>
                            );
                        }
                    )
                ) : null
            }


        </section>
    );
}

export default PageFoundResults;
