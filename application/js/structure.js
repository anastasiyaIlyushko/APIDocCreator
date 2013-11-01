$(document).ready(function(){
    alert("поехали");
    $( "#PropertieStructure_type").change(function() {
        alert($("#PropertieStructure_type :selected").val());
        
        var value = $("#PropertieStructure_type :selected").val();
        var block = '';
        switch (value) {
            case '0':
                block = getStringOptionsBlock('Item[0]');
                break;
            case '1':
                alert('Маловато');
                break;
            case '2':
                alert('Маловато');
                break;
            case '3':
                alert('Маловато');
                break;
            default:
                alert('Я таких значений не знаю');
        }
 
        block.insertAfter('#PropertieStructure_type');
        
        
    });
    
    function getStringOptionsBlock(name){
        alert(name);
        var result =  $('<div>', {
                                class: 'row',
                                text: 'Click Me!',
                                click: function(){
		                            alert("Advanced jQuery!")
	                            }
                        });
        var options = ['min', 'max'];
        for(var i=0; i<options.length; i++){
            getTextField(name + '[options]['+options[i]+']').appendTo(result);
        }
        //getTextField(name + '[options][min]').appendTo(result);
        //getTextField(name + '[options][max]').appendTo(result);
        return result;
        
    }
    
    function getTextField(name){
        var input = $('<input>', {
                                name: name,
                                id: name,
                                size: 60,
                                maxlength: 255
                        });
        var label = $('<label for='+name+'>Name</label>');
        $('<div>', {
                                class: 'row'
                        }).append(label);
        return $('<div>', {
                                class: 'row'
                        }).append(input);
    } 
})