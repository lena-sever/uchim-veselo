import React from "react";
import styles from "./Contacts.module.css";
import cg from './img/pic_girl.png'

const Contacts = (props) => {
    return (
        <>
            <div>
            <form action="#" method="get" className={styles.main}>
        <div className={styles.left_content}>
          <img src={cg} alt="contacts" width="300"/>
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
          <p className={styles.name_input}>Имя</p> <input className={styles.input} type="text" required placeholder="   Введите Ваше имя"/><br/>
          <p className={styles.name_input}>Email</p> <input className={styles.input} type="email" required  placeholder="    example@mail.ru"/><br/>
          <p className={styles.name_input}>Сообщение</p> <br/>
          <textarea className={styles.input} required id="Message" cols="50" rows="30" placeholder="    Введите текст сообщения"></textarea> <br/>
          <button className={styles.button_submit} type="submit">Отправить</button>
        </div>
      </form>
            </div>
        </>
    );
};

export default Contacts;
