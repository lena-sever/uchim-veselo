import "./AuthorPage.css";
import { useEffect } from "react";
import { useSelector, useDispatch } from "react-redux";
import { useParams, NavLink } from "react-router-dom";
import CircularProgress from "../curcularProgress/CircularProgress";
import { selectAuthor, selectAuthorError, selectAuthorLoading } from "../../store/author/authorSelector";
import { getAuthorComics } from "../../store/author/actions";

function AuthorPage() {
    const isLoading = useSelector( selectAuthorLoading );
    const error = useSelector( selectAuthorError );
    const { authorId } = useParams();
    const authorCourses = useSelector( selectAuthor );
    const dispatch = useDispatch();

    // console.log( authorId );
    // console.log( authorCourses );

    useEffect( () => {
        dispatch( getAuthorComics( authorId ) );

    }, [] );

    return (
        <section className="author"> {
            isLoading ? ( <CircularProgress/> ) : error ? ( <h3>Error</h3> ) :
                authorCourses.length > 0 ?
                    (
                        <>
                            <h2 className="author_title">Автор:
                                <span className="author_name">{ authorCourses[ 0 ].name_author }</span>
                            </h2>

                            { authorCourses.map( item => (
                                <div className="author_box">
                                    <img src={ item.img } alt=""/>
                                    <h3>{ item.title }</h3>
                                    <p>{ item.description }</p>
                                    <NavLink to={ `/courses/${ item.id }` } className="author_link">Перейти к комиксу</NavLink>
                                </div>
                            ) ) }
                        </>
                    ) : null
        }

        </section>
    );
}

export default AuthorPage;
