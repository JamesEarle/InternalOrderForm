/* global $ */

var item_count;

$(document).ready(function() {
	emailFieldListener();
    buttonListener();
    requiredFieldListener();
});

function requiredFieldListener() {
    resaleFieldListener();
    approverFieldListener();
}

function approverFieldListener() {
    $('#approver').on("change", function() {
        switch($(this).val()) {
            case "unapproved":
                $('#if_unapproved').prop('required', 'required');
                $('#if_unapproved').removeProp('disabled');
                break;
            case "Robin":
            case "Kevin":
                $('#if_unapproved').removeProp('required');
                $('#if_unapproved').prop('disabled', 'disabled');
                break;
        }
    });
}

function resaleFieldListener() {
    $('#resale').on('change', function() {
        
        // Field Elements
        var fe = [
            $('#if_expense'),
            $('#if_resale'),
            $('#if_resale_customer'),
            $('#if_resale_value')
        ];
        
        // These elements are a subset of the above, but always manipulated together.
        var sub = [fe[1], fe[2]];
                
        switch($(this).val()) {
            case 'donotknow':
                removeProperties(fe, 'required');
                addProperties(fe, 'disabled');
                resetValues(fe);
                break;
            case 'expense':
                fe[0].prop('required', 'required');
                fe[0].removeProp('disabled');
                               
                removeProperties(sub, 'required');
                addProperties(sub, 'disabled');
                addProperties([fe[3]], 'disabled');
                resetValues(sub);
                fe[3].val("");                
                break;
            case 'resale':                               
                removeProperties(sub, 'disabled');
                removeProperties([fe[3]], 'disabled');
                
                addProperties(sub, 'required');
                
                fe[0].removeProp('required');
                fe[0].prop('disabled', 'disabled');
                fe[0].val("");
                
                break;
        }
    });
}

function removeProperties(from, property) {
    for(var i=0;i<from.length;i++) {
        from[i].removeProp(property);
    }
}

function addProperties(from, property) {
    for(var i=0;i<from.length;i++) {
        from[i].prop(property, property);
    }
}

function resetValues(from) {
    for(var i=0;i<from.length;i++) {
        from[i].val("");
    }
}

function buttonListener() {
    buttonCSS();
    addButtonAppend();
    minusButtonRemove();
}

function buttonCSS() {
    $('.item_list').mousedown(function() {
        $(this).css('opacity', '0.7');
    });
    
    $('.item_list').mouseup(function() {
        $(this).css('opacity', '1');
    });
}

function addButtonAppend() {
    $('#add').click(function() {
        
        item_count = parseInt($('#num_items').val()) + 1;
        $('#num_items').val(item_count);
        
        $('#added_items').append(
            "<div id='appended_" + item_count + "'>" +
            '<h4>Item #' + item_count + '</h4>' +
            '<label for="already_purchased_' + item_count + '"><span>*</span>Already Purchased?</label>' + 
            '<select name="already_purchased_' + item_count + '" id="already_purchased_'+ item_count +'" required="required">' +
                '<option value="No">No</option>' +
                '<option value="Yes">Yes</option>' +
            '</select>' +
            '<br/>' +
            '<label for="item_link_' + item_count + '"><span>*</span>Link to Item(s) You Need To Purchase (Enter multiple links for the same item if you want someone to price check with shipping)</label>' + 
            '<br/>' +
            '<textarea required="required" rows="3" name="item_link_' + item_count + '" id="item_link_' + item_count + '"></textarea>' +
            '<br/>' +
            '<label for="quantity_' + item_count + '"><span>*</span>Quantity (Digits Only)</label>' +
            '<input required="required" name="quantity_' + item_count + '" id="quantity_' + item_count + '" size="3" onkeypress="return validate(event)">' +
            "</div>" 
        );
    });
}

function minusButtonRemove() {
   $('#minus').click(function() {
        $("div").remove("#appended_" + item_count);
        item_count--;       
        $('#num_items').val(item_count);        
    }); 
}

function emailFieldListener() {
	$('#email').focusout(function() {
		if(!validateEmail($(this).val()) && $(this).val() !== '') { // invalid
			$(this).css({
				transition: '0.3s',
				backgroundColor: '#FFCECE'
			}, 500);
		} else { // Valid
			$(this).css({
				transition: '0.3s',
				backgroundColor: ''
			}, 500);
		}
	});
}

function validateEmail(emailAddress) {
    var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
    return pattern.test(emailAddress);
}

/*
    Validate keypresses for the Quantity input field so users can 
    only ever enter numeric digits.
*/
function validate(event) {
	return event.charCode >= 48 && event.charCode <= 57
}

/*
    Highlights any field that triggers an error in a light red.
*/
function highlightError(element, flip) {
	if(flip) {
		$(element).css({
			transition: '0.3s',
			backgroundColor: '#FFCECE'
		}, 500);
	} else {
		$(element).css({
			transition: '0.3s',
			backgroundColor: ''
		}, 500);
	}
}
