import "./Highlighting.css";
import { useSelector } from "react-redux";
import { selectSearchWord } from "../../store/searchWord/searchWordSelector";

function Highlighting({ str }) {
    const searchWord = useSelector( selectSearchWord );
    const regexp = new RegExp( searchWord, "ig" );

    if(!str) return null;

    if( !searchWord ) return str;
    const matchValue = str.match( regexp ) || [];

    if( matchValue ) {

        return str.split( regexp ).map( (item, index, array) => {
            if( index < array.length - 1 ) {
                const a = matchValue.shift();
                console.log( a );
                return <>{ item }<span className="highlight">{ a }</span></>;
            }
            return item;
        } );
    }

    return str;
}

export default Highlighting;
