
		<?php for($i=0;$i<count($actorsdata);$i++){ ?>
			
			<?php 
				// Photos 
				if (!empty($actorsdata[$i]['photos'])) {
					$photo_src = base_url() . 'uploads/actors-photos/' . $actorsdata[$i]['id'];
				} else {
					$photo_src = base_url() . 'assets/images/default-actor-avatar.png';
				}

				// Name Surname
				if (strlen($actorsdata[$i]['name']) > 0 or strlen($actorsdata[$i]['surname']) > 0 ) {
					$name = "<div>" . $actorsdata[$i]['name'] . " " . $actorsdata[$i]['surname'] . "</div>";
				} else {
					$name = "";
				}

				// Age
				$birthDate = $actorsdata[$i]['date_of_birth'];
		  		$from = new DateTime($birthDate);
				$to   = new DateTime('today');
				$age = $from->diff($to)->y;

				// Language
				$languages = array();
				if ($actorsdata[$i]['lang_ru'] == 1) { array_push($languages, "Русский");}
				if ($actorsdata[$i]['lang_lv'] == 1) { array_push($languages, "Латышский");}
				if ($actorsdata[$i]['lang_en'] == 1) { array_push($languages, "Английский");}

				$languages = implode (", ", $languages);

				if (strlen($languages) > 1 ) {
					$languages = "<div>" . $languages . "</div>";
				} else {
					$languages = "";
				}

				// Signs
				if (strlen($actorsdata[$i]['signs']) > 1 ) {
					$signs = "<div>Особые приметы: " . $actorsdata[$i]['signs'] . "</div>";
				} else {
					$signs = "";
				}
				
				// Skills
				if (strlen($actorsdata[$i]['skills']) > 1 ) {
					$skills = "<div>Особые навыки: " . $actorsdata[$i]['skills'] . "</div>";
				} else {
					$skills = "";
				}

			?>

			<div class="actor-preview group">
				<div class="actor-photo"><img style="width: 200px;" src="<?= $photo_src; ?>" alt="Photo"></div>
				<div class="actor-info">
					<?= $name; ?> 
					<div>Возраст: <?= $age; ?></div>
					<div>Опыт в съемках: <?= $actorsdata[$i]['experience']; ?></div>
					<?= $languages; ?>
					<div>Акцент: <?= $actorsdata[$i]['accent']; ?></div>
					<?= $signs; ?>
					<?= $skills; ?>
					<?php if ($userdata['role'] == 'administrator') { ?>
						<a href="<?=base_url() . "index.php/main/delete_actor/" . $actorsdata[$i]['id']; ?>" class="danger">Удалить анкету</a><br>
						<a href="<?=base_url() . "index.php/main/edit_actor/" . $actorsdata[$i]['id']; ?>">Редактировать анкету</a><br>
					<?php } ?>
				</div>
			</div>

		<?php } ?>

	</div>	

	
</body>
</html>