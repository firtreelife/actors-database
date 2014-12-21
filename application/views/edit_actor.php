<?if($this->session->flashdata('flashSuccess')):?>
<p class="success"> <?=$this->session->flashdata('flashSuccess')?> </p>
<?endif?>

<?if($this->session->flashdata('flashError')):?>
<p class='error'> <?=$this->session->flashdata('flashError')?> </p>
<?endif?>

<div class="actor-preview group">
	<form action="<?=base_url();?>index.php/main/update_actor" method="post" enctype="multipart/form-data">
		<label for="actor-name">Имя:</label><input type="text" id="actor-name" name="name" value="<?= $name; ?>"><br>
		<label for="actor-surname">Фамилия:</label><input type="text" id="actor-surname" name="surname" value="<?= $surname; ?>"><br>
		
		<input type="hidden" name="id" value="<?= $id;?>">
		<label for="actor-dob">Дата рождения:</label>
		
		<select name="day">
			<?php
				for ($i=1; $i<=31 ; $i++) {
					$selected = ($date_of_birth[2]==$i ? "selected" : "");
					echo '<option value="'.$i.'"'. $selected .'>'.$i.'</option>';
				} 
			?>
		</select>

		<select name="month">
			<?php
				$months = array('Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Февраль'); 
				for ($i=0; $i<count($months); $i++) {
					$selected = ($date_of_birth[1]==($i+1) ? "selected" : "");
					echo '<option value="'.($i+1).'"'.$selected .'>'.$months[$i].'</option>';
				}
			?>
		</select>
		

		<select name="year">
			<?php
				for ($i=date("Y"); $i>=1900; $i--) { 
					$selected = ($date_of_birth[0]==$i ? "selected" : "");
					echo '<option value="'.$i.'"'.$selected.'>'.$i.'</option>';
				}
			?>
		</select>
		<br>

		<label for="actor-height">Рост:</label><input type="text" id="actor-height" name="height" value="<?= $height; ?>"><br>
		<label for="actor-weight">Вес:</label><input type="text" id="actor-weight" name="weight" value="<?= $weight; ?>"><br>
		<label for="actor-hair-color">Цвет волос:</label><input type="text" id="actor-hair-color" name="hair_color" value="<?= $hair_color; ?>"><br>
		<label for="actor-eye-color">Цвет глаз:</label><input type="text" id="actor-eye-color" name="eye_color" value="<?= $eye_color; ?>"><br>
		<label for="actor-clothing-size">Размер одежды:</label><input type="text" id="actor-clothing-size" name="clothing_size" value="<?= $clothing_size; ?>"><br>
		<label for="actor-shoe-size">Размер обуви:</label><input type="text" id="actor-shoe-size" name="shoe_size" value="<?= $shoe_size; ?>"><br>
		<label for="actor-sex">Пол:</label>
		<input type="radio" name="sex" value="Мужчина" <?= ($sex=="Мужчина" ? "checked" : ""); ?>>Мужчина
		<input type="radio" name="sex" value="Женщина" <?= ($sex=="Женщина" ? "checked" : ""); ?>>Женщина<br>
		
		<label for="actor-experience">Опыт:</label>
		<select name="experience" id="actor-experience">
			<option value="Профессиональный актер" <?= ($experience=="Профессиональный актер" ? "selected" : ""); ?>>Профессиональный актер</option>
			<option value="Есть опыт" <?= ($experience=="Есть опыт" ? "selected" : ""); ?>>Есть опыт</option>
			<option value="Нет опыта" <?= ($experience=="Нет опыта" ? "selected" : ""); ?>>Нет опыта</option>
		</select><br>

		<label for="actor-language">Язык:</label>
		<input type="checkbox" name="lang_ru" value="Russian" <?= ($lang_ru==1 ? "checked" : ""); ?>>Русский<br>
		<input type="checkbox" name="lang_lv" value="Latvian" <?= ($lang_lv==1 ? "checked" : ""); ?>>Латышский<br>
		<input type="checkbox" name="lang_en" value="English" <?= ($lang_en==1 ? "checked" : ""); ?>>Английский<br>

		<label for="actor-accent">Акцент:</label>
		<select name="accent" id="actor-accent">
			<option value="Нет" <?= ($accent=="Нет" ? "selected" : ""); ?>>Нет акцента</option>
			<option value="Слабый" <?= ($accent=="Слабый" ? "selected" : ""); ?>>Слабый</option>
			<option value="Сильный" <?= ($accent=="Сильный" ? "selected" : ""); ?>>Сильный</option>
		</select><br>
		
		<label for="actor-portfolio">Где снимался или театры:</label><br>
		<textarea name="portfolio" id="actor-portfolio" cols="30" rows="10"><?= $portfolio; ?></textarea><br>
		
		<label for="actor-skills">Навыки:</label>
		<input type="text" id="actor-skills" name="skills" value="<?= $skills; ?>"><br>

		<label for="actor-signs">Приметы:</label>
		<input type="text" id="actor-signs" name="signs" value="<?= $signs; ?>"><br>

		<label for="actor-photos">Фото:</label>
		<input type="file" id="actor-photos" name="photos"><br>

		<label for="actor-video">Видео:</label>
		<input type="text" id="actor-video" name="video"><br>

		<input type="submit" value="Сохранить анкету">
	</form>
	</div>
</body>
</html>