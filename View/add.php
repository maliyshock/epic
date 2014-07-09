<?php 

 echo  "<div class='add_wrapper margin-c'>
          <div class='big_btn margin-c'>+</div>
          <div class='form none margin-c'>
            <form action='' method='post'>
              <input type='text' placeholder='Имя' name='name'><br/>
              <input type='email' placeholder='email' name='email'><br/>
              <input type='text' placeholder='sex' name='sex'><br/>
              <input type='text' placeholder='родной город' name='native_city_id'><br/>
              <input type='number' placeholder='номер страхования' name='insurance_num'><br/>
              <input type='number' placeholder='номер карты пациента' name='card_num'><br/>
              <textarea cols='30' rows='5' placeholder='история болезни' name='history'></textarea><br/>
              <input type='file' value='загрузить фото' name='photo'><br/>
              <input type='submit' name='submit' value='Отправить'>
            </form>
            <div class='clear'></div>
          </div>
          </div>";

?>