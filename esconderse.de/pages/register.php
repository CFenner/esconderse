	<div class="headerWrap"><header><h1><? echo TITLE ?></h1></header></div>
	<article>
		<aside>
			<span class="error"><? echo $error_register; ?></span>
			<span class="msg"><? echo $msg_register; ?></span>
		</aside>
		<form action='?' method='POST' data-ajax='false'>
			<input name='type' value='register' type='hidden'/>
			<label for='email' class='ui-hidden-accessible'><?echo $i18n["label"]["username"]?></label>
			<input id='email' name='email' type="email" placeholder='<?echo $i18n["placeholder"]["username"]?>'/>
			<div><label for='password' class='ui-hidden-accessible'><?echo $i18n["label"]["password"]?></label>
			<input id='password' name='password' type='password' placeholder='<?echo $i18n["placeholder"]["password"]?>'/>
			<span class="pw_strength"><div></div><div></div><div></div><div></div></span>
			</div>
			<label for='repeat' class='ui-hidden-accessible'><?echo $i18n["label"]["rpassword_epeat"]?></label>
			<input id='repeat' name='repeat' type='password' placeholder='<?echo $i18n["placeholder"]["password_repeat"]?>'/>
			<button type='submit' data-ajax='false' class='ui-btn ui-corner-all ui-shadow ui-btn-a ui-btn-icon-left ui-icon-edit'
			onclick="return regformhash(this.form,
                                   this.form.email,
                                   this.form.password,
                                   this.form.repeat);" ><?echo $i18n["btn"]["register"]?></button>
			<?echo $i18n["label"]["or"]?> <a href="#login" data-transition="slide" data-direction="reverse" ><?echo $i18n["btn"]["login"]?></a>
		</form>
	</article>