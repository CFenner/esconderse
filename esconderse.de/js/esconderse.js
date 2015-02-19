jQuery(function($){
ESC = {
	STATUS_ACTIVE: 1
	,BLOCKER: '<div class="blocker"></div>'
	,EMPTY: '<li class="empty">Keine Weiterleitungen vorhanden.</li>'
	
	,init: function(){
		$('#new a.create').click(ESC.create);
		$('#dialog a.close').click(function(){
			$entity = $('#'+$(this).parent().parent().find('span.id').html());
			$.mobile.changePage('#main');
			$entity.find('.blocker').remove();
		});
		$('article ul li.empty').remove();
		$('article ul').append(
			$("<li class='entity loader' style='height:50px;'></li>"
		).append($(ESC.BLOCKER)));
		
		ESC.ajax("a=get", function (){
				return function(data)	{
					if(data.status == "success"){
						var list = $('article ul');
						for(key in data.result){
							var entity = data.result[key];
							list.append(
								ESC.entity.build( 
									entity.id, 
									entity.status == ESC.STATUS_ACTIVE, 
									entity.email, 
									entity.description));
						}
						if(data.result.length == 0){
							list.append(ESC.EMPTY);
						}
						list.find('li.loader').remove();
						list.listview('refresh');
					}else{
					
					}
				};
			}()
		);
	}
	,ajax: function(param, success){
		$.ajax({
			type: "GET",
			url: "ajax.php",
			data: param,
			success: success,
			error: ESC.handleError
		});
	}
	,handleError: function(xhr, desc, err) {
		console.log(xhr);
		console.log("Details: " + desc + "\nError:" + err);
    	alert(err);
    }
	,activate: function(e){
		$entity = $(this).closest('.entity');
		$entity.prepend(ESC.BLOCKER);
		ESC.ajax("a=activate&id="+$entity.attr('id'), function ($entity){
				return function(data){
					if(data.status == "success"){
						$entity.removeClass('inactive');
						ESC.count();
					}else{
						alert('Fehler: ' + data.msg);
					}
					$entity.find('.blocker').remove();
				};
			}($entity)
		);
	}
	,deactivate: function(){
		$entity = $(this).closest('.entity');
		$entity.prepend(ESC.BLOCKER);
		ESC.ajax("a=deactivate&id="+$entity.attr('id'), function($entity){
				return function(data){
					var time = 0;
					if(data.status == "success"){
						$entity.addClass('inactive');
						ESC.count();
					}else{
						if(data.result == "failure:flood_protection"){
							time = 300;
						}else{
							alert('Fehler: ' + data.msg);
						}
					}
					$entity.find('.blocker').delay(time).remove();
				};
			}($entity)
		);
	}
	,remove: function(){
		$entity = $(this).closest('.entity');
		$entity.prepend(ESC.BLOCKER);
        $('#dialog span.email').html($entity.find('input.email').val());
        $('#dialog span.id').html($entity[0].id);
        $('#dialog a.confirm').click(function($entity){
        	return function(){
        		ESC.ajax("a=remove&id="+$entity.attr('id'), function($entity){
						return function(data){
							if(data.status == "success"){
								ESC.entity.remove($entity);
								$.mobile.changePage('#main', {transistion: 'flip'});
							}else{
								$('#error span.error').html(data.msg); 
								$.mobile.changePage('#error', {transistion: 'flip'});
							}
							$entity.find('.blocker').remove();
						};
					}($entity)
				);
        	};
        }($entity));
		$.mobile.changePage('#dialog', {transistion: 'flip'});
	}
	,create: function(e){
		$description = $(this).parent().parent().find('input').val();
		ESC.ajax("a=create&d="+$description, function(){
				return function(data){
					if(data.status == "success"){
						ESC.entity.add(
							ESC.entity.build(
								data.result.id, 
								data.result.status == ESC.STATUS_ACTIVE, 
								data.result.email, 
								data.result.description
							)
						);
						ESC.count();
						$.mobile.changePage('#main');
					}else{
						alert('Fehler: ' + data.msg);
					}
				};
			}()
		);
	}
	,copy: function(e){
		var target = e.target;
		var entity = $(target).closest(".entity");
		var email = entity.find(".email");
		if(event.clipboardData){
			event.clipboardData.setData("text/plain", email.val());
			$("<span class='popup'>In Zwischenablage kopiert!</span>").popup({
				transition: "pop",
				afteropen: function(event, ui){
					setTimeout(
						function(t){
							return function(){
								$(t).popup("close");
							};
						}(target), 400);
				}
			}).popup("open", {"positionTo": target}).after;	
		}
		email.focus();
		email[0].selectionStart = 0;
		email[0].selectionEnd = 9999;
	}
	,count: function(){
		ESC.ajax("a=getCount", function(){
				return function(data){
					if(data.status == "success"){
						$('#popupMenu .ui-icon-gear span').first().html(data.current);
						$('#popupMenu .ui-icon-gear span').last().html(data.max);
					}
				};
			}()
		);
	}
	,entity: {
		add: function($entity, remove){
			if(remove)
				$('article ul li.empty').remove();
			$('article ul').prepend($entity).listview('refresh');
		}
		,remove: function($entity){
			var list = $('article ul');
			$entity.fadeOut("slow").remove();
			if(list.children().length == 0){
				list.append(ESC.EMPTY);
			}
			list.listview('refresh');
		}
		,build: function(id, isActive, mail, desc){
			var entity = $("<li>",{
				'id': id,
				'class': 'entity' + (isActive?'':' inactive'),
				'data-icon': false
			}).append(
				$("<h2>").append(desc)
			).append(
//				$("<p>").addClass("email").append(mail)
				$("<input>").addClass("email").val(mail).attr("readonly", true)
			).append(
				$("<p>").addClass("ui-li-aside").append(
					$("<span>").append(
						$("<a>",{
							'href': '#',
							'title': 'aktivieren',
							'data-role': 'button',
							'data-ajax': 'false',
							'class': 'activate ui-icon-check ui-btn-icon-notext ui-btn-inline ui-btn ui-corner-all ui-shadow'
						}).append("aktivieren").click(ESC.activate)
					).append(
						$("<a>",{
							'href': '#',
							'title': 'deaktivieren',
							'data-role': 'button',
							'data-ajax': 'false',
							'class': 'deactivate ui-icon-forbidden ui-btn-icon-notext ui-btn-inline ui-btn ui-corner-all ui-shadow'
						}).append("deaktivieren").click(ESC.deactivate)
					).append(
						$("<a>",{
							'href': '#',
							'title': 'löschen',
							'data-role': 'button',
							'data-ajax': 'false',
							'class': 'remove ui-icon-delete ui-btn-icon-notext ui-btn-inline ui-btn ui-corner-all ui-shadow'
						}).append("löschen").click(ESC.remove)
					).append(
						$("<a>",{
							'href': '#',
							'title': 'Email kopieren',
							'data-role': 'button',
							'data-ajax': 'false',
							'class': 'copy zCopy ui-icon-action ui-btn-icon-notext ui-btn-inline ui-btn ui-corner-all ui-shadow'
						}).append("Email kopieren").click(ESC.copy)
					)
				)
			);
			new ZeroClipboard(entity.find('.zCopy')).on("copy", ESC.copy);
			return entity;
		}
	}

};

ESC.init();
}(jQuery));