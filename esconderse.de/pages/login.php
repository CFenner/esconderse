	<?//echo print_r($_SESSION);?>
	<div class="headerWrap">
		<header>
			<h1><? echo TITLE ?></h1>	
			<span data-role="controlgroup" data-type="horizontal" data-mini="true">
	    		<a href="#whatis" data-ajax="false"
	    			class="ui-btn ui-corner-all ui-shadow ui-icon-info ui-btn-icon-notext "
	    			title="<? echo $i18n["tooltip"]["new"] ?>">Was ist das?</a>
			</span>
	
		</header>
	</div>
	<article>
		<aside>
			<span class="error"><? echo $error_login;?></span>
			<span class="msg"><? echo $msg_login; ?></span>
		</aside>
		<form action='?' method='POST' data-ajax='false'>
			<input name='type' value='login' type='hidden'/>
			<label for='user' class='ui-hidden-accessible'><?echo $i18n["label"]["username"]?></label>
			<input id='user' name='user' type="email" value='<? echo $user ?>' placeholder='<?echo $i18n["placeholder"]["username"]?>' data-theme='a'/>
			<label for='password' class='ui-hidden-accessible'><?echo $i18n["label"]["password"]?></label>
			<input id='password' name='password' type='password' placeholder='<?echo $i18n["placeholder"]["password"]?>'/>
			<button type='submit' data-ajax='false' class='ui-btn ui-corner-all ui-shadow ui-btn-a ui-btn-icon-left ui-icon-check'
"><?echo $i18n["btn"]["login"]?></button>
			<?echo $i18n["label"]["or"]?> <a href="#register" data-transition="slide"><?echo $i18n["btn"]["register"]?></a>
			<a href="#recover" data-transition="slide"><?echo $i18n["btn"]["forgotten"]?></a>
		</form>
	</article>