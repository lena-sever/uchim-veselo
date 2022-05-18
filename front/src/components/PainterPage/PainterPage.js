import "./PainterPage.css";
import { useEffect } from "react";
import { useSelector, useDispatch } from "react-redux";
import { useParams, NavLink } from "react-router-dom";
import CircularProgress from "../curcularProgress/CircularProgress";
import { selectPainter, selectPainterError, selectPainterLoading } from "../../store/painter/painterSelector";
import { getPainterComics } from "../../store/painter/actions";

function PainterPage() {
    const isLoading = useSelector( selectPainterLoading );
    const error = useSelector( selectPainterError );
    const { painterId } = useParams();
    const painterCourses = useSelector( selectPainter );
    const dispatch = useDispatch();

    // console.log( painterId );
    // console.log( painterCourses );

    useEffect( () => {
        dispatch( getPainterComics( painterId ) );

    }, [] );

    return (
        <section className="painter"> {
            isLoading ? ( <CircularProgress/> ) : error ? ( <h3>Error</h3> ) :
                painterCourses.length > 0 ?
                    (
                        <>
                            <h2 className="painter_title">Художник:
                                <span className="painter_name">{ painterCourses[ 0 ].name_painter }</span>
                            </h2>

                            { painterCourses.map( item => (
                                <div className="painter_box">
                                    <img src={ item.img } alt=""/>
                                    <h3>{ item.title }</h3>
                                    <p>{ item.description }</p>
                                    <NavLink to={ `/courses/${ item.id }` } className="painter_link">Перейти к комиксу</NavLink>
                                </div>
                            ) ) }
                        </>
                    ) : null
        }

        </section>
    );
}

export default PainterPage;
