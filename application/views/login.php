<body>	
	<div class="wrapper">
		<div id="contacts">
			<div id="logo">
				<img src="<?=base_url();?>assets/images/logo.png" alt="Forma Pro Films">
			</div>

			<div id="content">
				<h4>Адрес</h4>
				<p>Смилшу ул. 3, Рига, Латвия </p>
				<br>

				<p>+371 27775814</p> 
				<p>info@formaprofilms.com</p>
				<br>
				<h4>Maxim Pavlov</h4>
				<p>Продюсер<p>
				<br>
				<p>+371 27775814</p>
				<p>max@formaprofilms.com</p>
				<br>
				<h4>Yulia Zaytseva</h4>
				<p>CEO</p>

				<p>+371 29932003</p>
				<p>julia@formaprofilms.com</p>
			</div>	
		</div>
		<div id="login">
			<h1 id="login-title">Авторизация</h1>
			<div id="form">
				<form action="<?=base_url();?>index.php/login/verify" method="post">
					<input type="text" placeholder="Логин" name="username" id="username"><br>
					<input type="password" placeholder="Пароль" name="password" id="password"><br>
					<input type="submit" value="Войти" name="submit" id="submit">
				</form>
			</div>	
		</div>	
	</div>	
</body>
</html>