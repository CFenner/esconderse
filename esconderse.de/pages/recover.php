	<?//echo print_r($_SESSION);?>
	<div class="headerWrap"><header><h1><? echo TITLE ?></h1></header></div>
	<article>
		<aside>
			<span class="error"><? echo $error_recover; ?></span>
			<span class="msg"><? echo $msg_recover; ?></span>
		</aside>
		<form action='?' method='POST' data-ajax='false'>
			<h1><? echo $i18n["header"]["recover"] ?></h1>
			<p><? echo $i18n["msg"]["recover"] ?></p>
			<input name='type' value='recover' type='hidden'/>
			<label for='email' class='ui-hidden-accessible'><?echo $i18n["label"]["username"]?></label>
			<input id='email' name='email' type="email" placeholder='<?echo $i18n["placeholder"]["username"]?>'/>
			<button type='submit' data-ajax='false' class='ui-btn ui-corner-all ui-shadow ui-btn-a ui-btn-icon-left ui-icon-mail'><?echo $i18n["btn"]["recoverSend"]?></button>
		<!--	<?echo $i18n["label"]["or"]?> <a href="#login" data-transition="slide" data-direction="reverse" ><?echo $i18n["btn"]["login"]?></a>-->
		</form>
	</article>