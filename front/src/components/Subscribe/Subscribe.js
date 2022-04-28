import bird from './bird.png'
function Subscribe() {
  return (
    <>
      <section className="design-wrp">
                <div className="design">
                    <div className="design-title">Подпишитесь, чтобы быть в курсе изменений</div>

                    <form action="#" method="GET" className="design__form">
                        <input type="email" name="email" className="design__form-input" placeholder="Email" required></input>
                        <button type="submit" className="design__form-btn">ПОДПИСАТЬСЯ</button>
                    </form>
                    <img className="bird" src={bird}/>
                </div>
            </section>
    </>
  );
}

export default Subscribe;
