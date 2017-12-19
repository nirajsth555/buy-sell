//this is for bringing related brands to respective categories
$(function(){
    $('#category_dropdown').on('change',function(){     //postad ma jaba categorydropdown ma choose garxu yesle yo functio lai trigger garxa
        var id = $(this).val();                         //yesle chahi tyo category ma kun value select gereko xa ty record ma rakhxa ani id bhnne varibale ma store garxa
        $.ajax({
        	url:'/getSubcategory/'+id,                  //yo url ma janxa josle chahi hamro query call agrxa id  bhneko mathiko id ho
        	data:{
        		// id:id
        	},
        	//:function(data){
        		//var options = '';
        		//$.each(data,function(e){
        			//options += '<option value='+e.category_id+'>'+e.category_name+'</option>';
        		//});
        		//debugger;
        	//},
             success:function(data){                         //yed is succes bhayo bhne aba yo function bhitra chirxa
                
                $('#brand_dropdown option').remove();       //yesle purano option remove garxa
                $.each(data,function(i,value){              //php ko each function jastai ho uta select brand ko value pathaune garxa
                    $('#brand_dropdown').append($('<option>').text(value.category_name).attr('value',value.category_id));
                });
                },
            
        	error:function(e) {
        		console.log(e);
        	}
        })
    })


}) ;



      //end of function







//add another phone number
$(document).ready(function(){
    var max_fields=3;
    var x=1;

    $(".add_field_button").on('click',function(e){
        e.preventDefault();
        if(x<max_fields){
            x++;
        $(".input_fields_wrap").append('<label>Your Mobile No <span>*</span></label><input type="text" class="phone" name="phone[]" placeholder="" >');    
        }
    });
});
//end 

//confirmpassword
$(document).ready(function(){
$('#password, #confirm_password').on('keyup', function () {

  if ($('#password').val() == $('#confirm_password').val()) {
    $('#message').html('Password match').css({"color":"green","font-style":"italic","font-family":"cursive"});
  } else 
    $('#message').html('Password and Confirm Password donot match').css({"color":"red","font-style":"italic","font-family":"cursive"});
});
});



//strenth of password
$(document).ready(function(){
$('#password').keyup(function(){
    $('#message_strength').html(checkStrength($('#password').val()))
})

function checkStrength(password){
    var strength=0;
    if(password.length<6){
        $('#message_strength').removeClass()
        $('#message_strength').addClass('short')
        return $('#message').html('Password must contain at least 6 characters').css({"color":"red","font-style":"italic","font-family":"cursive"});
    }

    if(password.length>7)
        strength +=1;
    if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/))  
        strength += 1;
    if (password.match(/([a-zA-Z])/) && password.match(/([0-9])/))  
        strength += 1; 
    if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/))  
        strength += 1;
    if (password.match(/(.*[!,%,&,@,#,$,^,*,?,_,~].*[!,",%,&,@,#,$,^,*,?,_,~])/)) 
        strength += 1;
    if (strength < 2 ) {
           $('#message_strength').removeClass()
        $('#message_strength').addClass('weak')
        return $('#message').html(' Weak').css({"color":"red","font-style":"italic","font-family":"cursive"});
    }
    else if 
        (strength == 2 ) {
     $('#message_strength').removeClass()
        $('#message_strength').addClass('good')
        return $('#message').html('  Good').css({"color":"green","font-style":"italic","font-family":"cursive"});
    }

    else { 
     $('#message_strength').removeClass()
        $('#message_strength').addClass('strong')
        return $('#message').html('Strong').css({"color":"green","font-style":"italic","font-family":"cursive"}); 
    }


}
});
//end



$(document).ready(function(){

$("#name").change(function() { 

var usrN = $("#name").val();

if(usrN.length >= 4)
{
    $("#statuspass").html(' Checking ...');

    $.ajax({  
        type: "get",  
        url : "checkname", 
        data:{
            fullname:usrN,
        },
        success: function(msg){  
            $("#statuspass").html(msg);
        }
    });
} else
    {
        $("#statuspass").html('<font color="red" style="margin-left:125px;">Username should be at least 4 letters <strong></strong> .</font>');
        $("#name").removeClass('object_ok'); 
        $("#name").addClass("object_error");
    }

});

});
