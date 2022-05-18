import Carousel from 'react-bootstrap/Carousel'
import slide1 from '../../assets/slide1.jpg'
import slide2 from '../../assets/slide2.jpg'
import slide3 from '../../assets/slide3.jpg'
import React  from 'react';
import { useState } from 'react';


function ControlledCarousel() {
  const [index, setIndex] = useState(0);

  const handleSelect = (selectedIndex, e) => {
    setIndex(selectedIndex);
  };

  return (
    <Carousel activeIndex={index} onSelect={handleSelect} interval={4000}>
      <Carousel.Item>
        <img
          className="d-block w-100"
          src={slide1}
          alt="First slide"
        
        />
        <Carousel.Caption>
          <h3  >Тебя ждёт встреча с самыми опасными монстрами этой вселенной</h3>
         
        </Carousel.Caption>
      </Carousel.Item>

      <Carousel.Item>
        <img
          className="d-block w-100"
          src={slide2}
          alt="Second slide"
        />

        <Carousel.Caption>
          <h3>Твои любимые квадратные герои будут попадать в самые невероятные приключения</h3>
                  </Carousel.Caption>
      </Carousel.Item>


      <Carousel.Item>
        <img
          className="d-block w-100"
          src={slide3}
          alt="Third slide"
        />

        <Carousel.Caption>
          <h3>Тебе придётся применить свои собственные знания, чтобы помочь героям справиться с монстрами. Ты готов?</h3>
         
        </Carousel.Caption>
      </Carousel.Item>

         </Carousel>
  );
}
export default ControlledCarousel;