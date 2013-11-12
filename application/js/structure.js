$(document).ready(function(){
	
	$.ajax({
		url: document.location.href,
		dataType: 'json',
		success: function(data) {
			//var form = $('form');
			var form = $('<form  id="propertie-form" action="'+document.location.href+'" method="post"></form>')
			
			buildMainStructureBlock(data.struct).prependTo(form);
			buildPropertieBlock(data).prependTo(form);
			$('<div class="row buttons"><input type="submit" name="yt0" value="Save"></div>').appendTo(form);
			form.appendTo($('#content'));

		}
			
	});
	
	function buildMainStructureBlock(data){
		var name = 'PropertieStructure';
		var block = $("<div class='row' name='"+name+"'></div>");
		var struct = data;
		buildTypeSelect(name, struct.type).appendTo(block);
		if(struct.id !== undefined){
			optionBlockBuilderFactory(struct.type, name, struct).appendTo(block);
		}
		
		
		return block;
	}
	
	function buildPropertieBlock(data){
		var name = 'CollectPropertie';
		var block = $("<div class='row' name='"+name+"'></div>");
		var attributes = ['name', 'description'];
		var row,input,attributName;
		for(var i=0; i<attributes.length; i++){
			attributName = attributes[i];
			row = $("<div class='row'></div>");
			input = $('<input>', {
				name: name + '['+attributName+']',
				type: 'textfield',
				value: data[attributName],
				size: 60,
				maxlength: 255,
				placeholder: attributName
			});
			row.append($("<span>"+attributName+"</span></br>"));
			row.append(input);
			block.append(row);
		}
		
		return block;
		
	}
	
	
	$( "select.selectType").live('change', function() {
		var parentDiv = $(this).parent('div').parent('div');
		parentDiv.children('div[name="optionBlock"]').remove();
		parentDiv.children('div[name*="item"]').remove();
		var name = parentDiv.attr('name');
		var propertieType = $("select[name='"+name+"[type]'] :selected").val();
		
		optionBlockBuilderFactory(propertieType, name, null).appendTo(parentDiv);
		
	});
	
	function optionBlockBuilderFactory(propertieType, name, struct){
		var result;
		var objectId = null;
		var item = null;
		var options = null;
		if((struct !== null)){
			if(!((struct.options == undefined) || (struct.options == 'null'))){
				objectId = JSON.parse(struct.options).objectId;
				options = JSON.parse(struct.options);
			}
			item = struct.item;
		}
		
		
		switch (propertieType) {
			case '0':
				result = buildOptionBlock(propertieType, name, options);
				break;
			case '1':
				result = buildOptionBlock(propertieType, name, options);
				break;
			//object
			case '2':
				result = buildSelectObjectsBlock(name, objectId);
				break;
			//array
			case '3':
				result = buildNewStructureBlock(name, item);
				break;
			//
			default:
				result = $('<div></div>');
				//result = null;

		}
		
		return result;
	}
	
	
	
	function buildOptionBlock(value, name, options){
		var block = $("<div class='row' name='optionBlock'></div>");
		var row, input, val, check;
		$.ajax({
			url: 'options',
			dataType: 'json',
			data: {
				optionType: value
			},
			success: function(optionsObject) {
				for(var i in optionsObject){
					if(options == null){
						val = '';
						check = false;
					}else{
						val = options[i];
						check = options[i];
					}
					row = $('<div class="row"></div>');
					input = $('<input>', {
						name: name+'[options]['+i+']',
						type: optionsObject[i],
						value: val,
						size: 60,
						maxlength: 255,
						placeholder: i,
						checked: check
					});
					//row.append($("<span>"+i+"</span></br>"));
					//row.append(input);
					
					
					//block.append(row);
					block.append($("<span>"+i+"</span></br>"));
					block.append(input);
					block.append($('</br>'));
				}
			}
			
		});
		
		return block;
	}
	
	function buildSelectObjectsBlock(name, selectedValue){
		var block = $("<div class='row' name='optionBlock'></div>");
		var select = $('<select name="'+name+'[options][objectId]"></select>');
		select.append($('<option value>Выберите объект</option>'));
		var selected;
		$.ajax({
			url: '/substances',
			dataType: 'json',
			success: function(data) {
				for(var i in data){
					if(i == selectedValue){
						selected = 'selected';
					}else{
						selected = '';
					}
					select.append($('<option '+selected+' value="'+i+'">'+data[i]+'</option>'));
				}
				
			}
			
		});
		return block.append(select);
	}
	
	function buildNewStructureBlock(name, struct){
		var itemName = name + '[item]'; 
		var block = $("<div class='row offset1' name='"+itemName+"'></div>");
		var type = null;
		
		if(struct !== null){
			type = struct.type;
		}
				
		var select = buildTypeSelect(itemName, type);
		block.append(select);

		optionBlockBuilderFactory(type, itemName, struct).appendTo(block);

		
		
		
		return block;
	}
	
	function buildTypeSelect(name, selectedValue){
		var row = $("<div class='row'></div>");
		var select = $('<select class="selectType" name="'+name+'[type]"></select>');
		var selected;
		select.append($('<option value>Type</option>'));
		$.ajax({
			url: 'options',
			dataType: 'json',
			success: function(data) {
				for(var i=0; i<data.length; i++){
					if(i == selectedValue){
						selected = 'selected';
					}else{
						selected = '';
					}
					select.append($('<option '+selected+' value="'+i+'">'+data[i]+'</option>'));
					
				}
				
			}
			
		});
		row.append($("<span>Type</span></br>"));
		row.append(select);
		
		return row;
	}

})