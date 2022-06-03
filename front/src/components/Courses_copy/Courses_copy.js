import Navigation from "../Navigation/Navigation";
import prod1 from '../../img/product_photo6.png'
import prod2 from '../../img/prod2.jpg'
import prod3 from '../../img/prod3.png'
import prod4 from '../../img/prod4.png'
import prod5 from '../../img/prod5.jpg'
import prod6 from '../../img/prod6.jpg'

function Header() {
  return (
    <>
       <section className="products">

<div className="products_item">
            <a href="product.html" className="products_item_img">
                <img className="products_item_img_w" src={prod3} alt="product_photo"></img>
            </a>
            <div className="products_item_text_box">
                <p className="text_box_header">Английский для взрослых</p>
                <p className="text_box_main">Known for her sculptural takes on&nbsp;traditional tailoring,
                    Australian
                    arbiter of&nbsp;cool Kym Ellery teams up&nbsp;with Moda Operandi.</p>
                                  </div>
            <button className="products_item_btn txt">
                                       <span>НАЧАТЬ УЧИТЬСЯ</span>
            </button>


        </div>
        <div className="products_item">
            <a href="product.html" className="products_item_img">
                <img className="products_item_img_w" src={prod4} alt="product_photo"></img>
            </a>
            <div className="products_item_text_box">
                <p className="text_box_header">Программирование для школьников</p>
                <p className="text_box_main">Known for her sculptural takes on&nbsp;traditional tailoring,
                    Australian
                    arbiter of&nbsp;cool Kym Ellery teams up&nbsp;with Moda Operandi.</p>
                                  </div>
            <button className="products_item_btn txt">
                                       <span>НАЧАТЬ УЧИТЬСЯ</span>
            </button>


        </div>
        <div className="products_item">
            <a href="product.html" className="products_item_img">
                <img className="products_item_img_w" src={prod5} alt="product_photo"></img>
            </a>
            <div className="products_item_text_box">
                <p className="text_box_header">Программирование для взрослых</p>
                <p className="text_box_main">Known for her sculptural takes on&nbsp;traditional tailoring,
                    Australian
                    arbiter of&nbsp;cool Kym Ellery teams up&nbsp;with Moda Operandi.</p>
                                  </div>
            <button className="products_item_btn txt">
                                       <span>НАЧАТЬ УЧИТЬСЯ</span>
            </button>


        </div>
        <div className="products_item">
            <a href="product.html" className="products_item_img">
                <img className="products_item_img_w" src={prod6} alt="product_photo"></img>
            </a>
            <div className="products_item_text_box">
                <p className="text_box_header">Разработка игр для детей</p>
                <p className="text_box_main">Known for her sculptural takes on&nbsp;traditional tailoring,
                    Australian
                    arbiter of&nbsp;cool Kym Ellery teams up&nbsp;with Moda Operandi.</p>
                                  </div>
            <button className="products_item_btn txt">
                                       <span>НАЧАТЬ УЧИТЬСЯ</span>
            </button>


        </div>
        <div className="products_item">
            <a href="product.html" className="products_item_img">
                <img className="products_item_img_w" src={prod2} alt="product_photo"></img>
            </a>
            <div className="products_item_text_box">
                <p className="text_box_header">Английский для школьников</p>
                <p className="text_box_main">Known for her sculptural takes on&nbsp;traditional tailoring,
                    Australian
                    arbiter of&nbsp;cool Kym Ellery teams up&nbsp;with Moda Operandi.</p>
                                  </div>
            <button className="products_item_btn txt">
                                       <span>НАЧАТЬ УЧИТЬСЯ</span>
            </button>


        </div>
        <div className="products_item">
            <a href="product.html" className="products_item_img">
                <img className="products_item_img_w" src={prod1} alt="product_photo"></img>
            </a>
            <div className="products_item_text_box">
                <p className="text_box_header">Английский для дошкольников</p>
                <p className="text_box_main">Known for her sculptural takes on&nbsp;traditional tailoring,
                    Australian
                    arbiter of&nbsp;cool Kym Ellery teams up&nbsp;with Moda Operandi.</p>
                                  </div>
            <button className="products_item_btn txt">
                                       <span>НАЧАТЬ УЧИТЬСЯ</span>
            </button>


        </div>

    </section>
    </>
  );
}

export default Header;
