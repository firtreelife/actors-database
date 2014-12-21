<body>
	<div class="wrapper wrap-2">
		<div class="group">
			<div class="admin-heading">
				<?= "Вы авторизированы как " . $userdata['username'] ."."; ?>
					
				<a href="<?= base_url() . "index.php/main/logout"; ?>">Выйти</a><br>

				<?php if ($userdata['role'] == 'administrator') {
						if (!isset($add_actor_page)) { ?>
							<a href="<?= base_url() . "index.php/main/add_actor/"; ?>">Добавить анкету</a><br/>
							<!-- <a href="#">Создать нового пользователя</a> -->
				<?php   } else { ?>
							<a href="<?= base_url();?>index.php/main">Просмотр анкет</a>
				<?php   } 
						if (isset($edit_actor_page)) { ?>
							<a href="<?= base_url();?>index.php/main">Просмотр анкет</a>
				<?php	}
						

				} ?>
			</div>
		</div>