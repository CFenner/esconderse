	<?//echo print_r($_SESSION);?>
	<div class="headerWrap"><header><h1><? echo TITLE ?></h1></header></div>
	<article>
		<aside>
			<span class="error"><? echo $error_reset; ?></span>
			<span class="msg"><? echo $msg_reset; ?></span>
		</aside>
		<form action='?' method='POST' data-ajax='false'>
			<h1><? echo $i18n["header"]["reset"] ?></h1>
			<p><? echo $i18n["msg"]["reset"] ?></p>
			<input name='type' value='recoverReset' type='hidden'/>
	        <input type="hidden" name="email" value="<?= $_GET['email']=='' ? $_POST['key'] : $_GET['email']; ?>" />
	        <input type="hidden" name="key" value="<?= $_GET['key']=='' ? $_POST['key'] : $_GET['key']; ?>" />
			<!--
			<label for='email' class='ui-hidden-accessible'><?echo $i18n["label"]["username"]?></label>
			<input id='email' name='email' type="email" placeholder='<?echo $i18n["placeholder"]["username"]?>'/>-->
			<label for='pw0' class='ui-hidden-accessible'><?echo $i18n["label"]["password"]?></label>
	        <input type="password" class="input" name="pw0" id="pw0" value="" maxlength="20" placeholder="<?echo $i18n["label"]["password"]?>">
			<label for='pw1' class='ui-hidden-accessible'><?echo $i18n["label"]["password_repeat"]?></label>
	        <input type="password" class="input" name="pw1" id="pw1" value="" maxlength="20" placeholder="<?echo $i18n["label"]["password_repeat"]?>">
			<button type='submit' data-ajax='false' class='ui-btn ui-corner-all ui-shadow ui-btn-a ui-btn-icon-left ui-icon-edit'><?echo $i18n["btn"]["change"]?></button>
		</form>
	</article>