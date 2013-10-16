<div id="loginbox">
	<div id="login-inner">
		<form method="post">
			<table border="0" cellpadding="0" cellspacing="0">
				<tr>
					<th>Usuário</th>
					<td><input type="text" class="login-inp" name="data[User][username]" /></td>
				</tr>
				<tr>
					<th>Senha</th>
					<td><input type="password" class="login-inp" name="data[User][password]" /></td>
				</tr>
				<tr>
					<th></th>
					<td><input type="submit" class="submit-login"  /></td>
				</tr>
			</table>
		</form>
	</div>

	<div class="clear"></div>
	<a href="" class="forgot-pwd">Esqueceu sua Senha?</a>
</div>

<div id="forgotbox">
	<div id="forgotbox-text">Please send us your email and we'll reset your password.</div>
	<!--  start forgot-inner -->
	<div id="forgot-inner">
		<table border="0" cellpadding="0" cellspacing="0">
			<tr>
				<th>Email:</th>
				<td><input type="text" value=""   class="login-inp" /></td>
			</tr>
			<tr>
				<th> </th>
				<td><input type="button" class="submit-login"  /></td>
			</tr>
		</table>
	</div>
	<!--  end forgot-inner -->
	<div class="clear"></div>
	<a href="" class="back-login">Voltar ao Login</a>
</div>