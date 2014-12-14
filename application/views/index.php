<body>
	<div class="wrapper wrap-2">
		<div class="group">
			<div class="admin-heading">
				<?= "Вы авторизированы как " . $userdata['username'] ."."; ?>
					
				<a href="main/logout">Выйти</a><br>

				<?php if ($userdata['role'] == 'administrator') { ?>
					<a href="#">Добавить анкету</a><br/>
					<!-- <a href="#">Создать нового пользователя</a> -->
				<?php } ?>
			</div>
		</div>


		

		<?php for($i=0;$i<count($actorsdata);$i++){ ?>

			<div class="actor-preview group">
				<div class="actor-photo"></div>
				<div class="actor-info">
					<div><?= $actorsdata[$i]['name'];?> <?=$actorsdata[$i]['surname'];?></div> <!-- name surname -->
					<div>Возраст: <?= $actorsdata[$i]['date_of_birth'];?></div>
					<div><?= $actorsdata[$i]['experience'];?></div> <!-- experience -->
					<div>Опыт в съемках: <?= $actorsdata[$i]['portfolio'];?></div> <!-- portfolio -->
					<div></div> <!-- languagesstr -->
					<div>Акцент: <?= $actorsdata[$i]['accent'];?></div>
					<div>Особые приметы: <?= $actorsdata[$i]['signs'];?></div><!--  signs -->
					<div>Особые навыки: <?= $actorsdata[$i]['skills'];?></div><!-- skills -->
					<?php if ($userdata['role'] == 'administrator') { ?>
						<button class="danger" onclick="delete_actor(this)">Удалить анкету</button><br>
						<a href="actor_edit.php?id=">Редактировать анкету</a><br>
					<?php } ?>
				</div>
			</div>

		<?php } ?>

	</div>	

	
</body>
</html>