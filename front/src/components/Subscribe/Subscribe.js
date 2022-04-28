import bird from './bird.png'
function Subscribe() {
  return (
    <>
      <section class="design-wrp">
                <div class="design">
                    <div class="design-title">Подпишитесь, чтобы быть в курсе изменений и узнавать о выходе новых комиксов.</div>

                    <form action="#" method="GET" class="design__form">
                        <input type="email" name="email" class="design__form-input" placeholder="Email" required></input>
                        <button type="submit" class="design__form-btn">ПОДПИСАТЬСЯ</button>
                    </form>
                    <img class="bird" src={bird}/> 
                </div>
            </section>
    </>
  );
}

export default Subscribe;