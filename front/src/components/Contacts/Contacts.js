import React, { useState, useEffect } from "react";
import styles from "./Contacts.module.css";
import cg from './img/pic_girl.png'
import axios from "axios";


const Contacts = (props) => {
  const [data, setData] = useState({
    user_id: "",
    name: "",
    email: "",
    message: "",
  });
  const url = "https://uchim-veselo.ru/api/messange";

  let messageEl = document.querySelector("#sendmessage");

  async function postData() {
    try {
      const response = await axios.post(url, data);
      console.log(response);
      messageEl.textContent = "Сообщение успешно отправлено";
    } catch (error) {
      console.error(error);
    }

    setData({
      user_id: "",
      name: "",
      email: "",
      message: "",
    })
  }

  function handle(e) {
    const newdata = { ...data };
    newdata[e.target.id] = e.target.value;
    setData(newdata);
  }

  return (
    <>
      <div>
        <form onSubmit={postData} className={styles.main}>
          <div className={styles.left_content}>
            <img src={cg} alt="contacts" width="300" />
            <h4 className={styles.left_content_h4}>СВЯЖИТЕСЬ С НАМИ</h4>
            <p className={styles.left_text_contact}>Lorem cing Lorem ipsum dolor sit amet.</p>
            <h4 className={styles.left_content_h4_phone}>ТЕЛЕФОНЫ</h4>
            <ul className={styles.left_ul_num}>
              <li className={styles.left_li}>88001000800</li>
              <li>89001000900</li>
            </ul>
            <h4 className={styles.left_content_h4}>ONLINE</h4>
            <ul className={styles.web}>
              <li className={styles.left_li_web}>mvmv.ru</li>
              <li className={styles.left_li_mail}>mbvmb@mail.ru</li>
            </ul>

          </div>

          <div className={styles.rigth_content} >
            <h4 className={styles.left_content_h4}>НАПИШИТЕ НАМ СООБЩЕНИЕ</h4>
            <p className={styles.name_input}>Имя</p>

            <input onChange={(e) => handle(e)} value={data.name} id="name" className={styles.input} type="text" required placeholder="   Введите Ваше имя" /><br />
            <p className={styles.name_input}>Email</p>

            <input onChange={(e) => handle(e)} value={data.email} id="email" className={styles.input} type="email" required placeholder="    example@mail.ru" /><br />
            <p className={styles.name_input}>Сообщение</p> <br />

            <textarea onChange={(e) => handle(e)} value={data.message} id="message" className={styles.input} required cols="50" rows="30" placeholder="    Введите текст сообщения"></textarea> <br />

            <p className={styles.sendedMessage} id="sendmessage"></p>

            <button className={styles.button_submit} type="submit">Отправить</button>
          </div>
        </form>
      </div>
    </>
  );
};


export default Contacts;
