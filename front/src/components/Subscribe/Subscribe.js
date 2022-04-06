function Subscribe() {
  return (
    <>
      <section class="design-wrp">
                <div class="design">
                    <div class="design-title">Подпишитесь, чтобы быть в курсе изменений</div>
                    {/* <img src="../img/beard.png"/> */}
                    <form action="#" method="GET" class="design__form">
                        <input type="email" name="email" class="design__form-input" placeholder="Email" required></input>
                        <button type="submit" class="design__form-btn">ПОДПИСАТЬСЯ</button>
                    </form>
                </div>
            </section>
    </>
  );
}

export default Subscribe;