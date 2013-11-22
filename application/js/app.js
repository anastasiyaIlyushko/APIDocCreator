Properties = Ember.Application.create({
	ready: function(){
	//alert('hi');
	},
	rootElement: 'form#propertie-form'
});

Properties.IndexRoute = Ember.Route.extend({
	setupController: function(controller) {
		$.ajax({
			url: document.location.href,
			dataType: 'json',
			success: function(data) {
				var result = Properties.Propertie.create(data);
				controller.set('model',result);
				if(data.id === null){
					controller.set('operation', 'create');
				}else{
					controller.set('operation', 'update');
				}
				controller.send('checkAccess', 'all');
				$.ajax({
					url: 'options',
					dataType: 'json',
					success: function(data) {
						controller.set('optionsTypes', data);
						controller.send('build');
					}
			
			
				});
			}
			
		});
		
	}
});

Properties.Propertie = Ember.Object.extend();

Properties.IndexController = Ember.ObjectController.extend({
	operation: '',
	optionsTypes: null,
	disabled: null,
	name: 'CollectPropertie',
	checkAccess: function(rule){
		if(rule === 'all'){
			this.set('disabled', null);
		}else{
			this.set('disabled', 'disabled');
		}
	},
	build: function(){
		
		this.buildMainBlock();
		this.buildStructBlock();
		
	},
	buildMainBlock: function(){
		var blockName = 'CollectPropertie';
		collectPropertie = Ember.ContainerView.create({
			classNames: ['row'],
			attributeBindings: ['name']
		});
		collectPropertie.set('name', blockName);
		
		collectPropertie.appendTo('form#propertie-form');
		var propertieArray = ['name', 'description'];
		
		for (var i=0; i<propertieArray.length; i++){
			var childView;
			var ItemName = blockName+'['+propertieArray[i]+']';
			var value = this.get("model."+propertieArray[i]);
			childView = Ember.View.create({
				//classNames: ['row'],
				template: Ember.Handlebars.compile('<label>'+propertieArray[i]+'</label><input type="text" name="'+ItemName+'" value="'+ value + '" ' + this.get("disabled") +'>')
			});
			collectPropertie.pushObject(childView);
		}

	},
	buildStructBlock: function(){
		//		var name = 'PropertieStructure';
		//		var block = $("<div class='row' name='"+name+"'></div>");
		//		var struct = data;
		//		buildTypeSelect(name, struct.type).appendTo(block);
		//		if(struct.id !== undefined){
		//			optionBlockBuilderFactory(struct.type, name, struct).appendTo(block);
		//		}
		//		
		//		
		//		return block;
		var blockName = 'PropertieStructure';
		var struct  = this.get('model.struct');
		structPropertie = Ember.ContainerView.create({
			classNames: ['row'],
			attributeBindings: ['name']
		});
		structPropertie.set('name', blockName);
		structPropertie.appendTo('form#propertie-form');
		structPropertie.pushObject(this.buildTypeSelect(blockName, struct.type));



	},
	buildTypeSelect: function(parentName, selectedValue){
		
		var content, select;
		content = this.get('optionsTypes');
		if((this.get('operation') == 'create') || (selectedValue == null)){
			select = Ember.Select.create({
				attributeBindings: ['content', 'prompt'],
				content: content,
				prompt: "Выберите тип"
			});
		}else{
			select = Ember.Select.create({
				attributeBindings: ['content', 'value'],
				content: content,
				value: content[selectedValue]
			});
		}
		select.set('name', parentName + '[type]');
		return select;
		
		
		
	//		var row = $("<div class='row'></div>");
	//		var select = $('<select class="selectType" name="'+name+'[type]"></select>');
	//		var selected;
	//		select.append($('<option value>Type</option>'));
	//		$.ajax({
	//			url: 'options',
	//			dataType: 'json',
	//			success: function(data) {
	//				for(var i=0; i<data.length; i++){
	//					if(i == selectedValue){
	//						selected = 'selected';
	//					}else{
	//						selected = '';
	//					}
	//					select.append($('<option '+selected+' value="'+i+'">'+data[i]+'</option>'));
	//					
	//				}
	//				
	//			}
	//			
	//		});
	//		row.append($("<span>Type</span></br>"));
	//		row.append(select);
	//		
	//		return row;
	}
	
});

PropertieField = Ember.View.create({
	//	tagName: 'input',
	//	attributeBindings: ['disabled', 'value', 'name'],
	//	name: function(){
	//		return this.get("controller.name")+'['+this.get("controller.model.description")+']';
	//	}.property(),
	//	value: function(){
	//		return this.get("controller.model.description");
	//	}.property("controller.model.description"),
	//	disabled: function(){
	//		return this.get("controller.disabled");
	//	}.property("controller.disabled")
	//	render: function(buffer){
	//		var model = this.get("controller.model");
	//		alert(this.get("controller.model.name"));
	//		for (var i in model) {
	//			buffer.push("<button value='" + i + "'");
	//			buffer.push(">" + i + "</button>");
	//		}
	//	}
	});

//aContainer.appendTo('div#content');
//PropertieName = Ember.View.extend({
////	templateName: 'main',
//	tagName: 'input',
//	label: 'hi',
//	attributeBindings: ['disabled', 'value'],
//	disabled: function() {
//		return this.get("controller").send('readOnly');
//	}.property(),
//	value: function(){
//		return this.get("controller.model.name");
//	}.property("controller.model.name")
//});
//
//PropertieDescription = PropertieName.extend({
//	value: function(){
//		return this.get("controller.model.description");
//	}.property("controller.model.description")
//});



