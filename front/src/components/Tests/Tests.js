import "./Tests.css";
import Slider from "react-slick";

import Test2 from "./TestItem2";
import Test1 from "./TestItem1";
import Test3 from "./TestItem3";


function Tests() {
    const testItems = [ <Test1/>, <Test2/>, <Test3/> ];
// const settings={
//     dots: true,
//     infinite: true,
//     speed: 500,
//     slidesToShow: 1,
//     slidesToScroll: 1
// }
//     return (
        // <Slider {...settings}>
        //     { testItems.map( item => item ) }
        // </Slider >
        // <div>
        //     { testItems.map( item => item ) }
        // </div>
    // )
}

export default Tests;
