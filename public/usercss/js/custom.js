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
    var password=  $('#password').val();
$('#password, #confirm_password').on('keyup', function () {

 if( password ==  ""){
  $('#message_strength').html('Please enter your password').css({"color":"red","font-style":"italic","font-family":"cursive"});  
 }
  if ($('#password').val() == $('#confirm_password').val() && password != "") {
    $('#message').html('Password match').css({"color":"green","font-style":"italic","font-family":"cursive"});
  } if ($('#password').val() != $('#confirm_password').val()){
    $('#message').html('Password and Confirm Password donot match').css({"color":"red","font-style":"italic","font-family":"cursive"});
}
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
        return $('#message').html('Password strength: weak').css({"color":"red","font-style":"italic","font-family":"cursive"});
    }
    else if 
        (strength == 2 ) {
     $('#message_strength').removeClass()
        $('#message_strength').addClass('good')
        return $('#message').html('Password strength:  Good').css({"color":"green","font-style":"italic","font-family":"cursive"});
    }

    else { 
     $('#message_strength').removeClass()
        $('#message_strength').addClass('strong')
        return $('#message').html('Password strength:Strong').css({"color":"green","font-style":"italic","font-family":"cursive"}); 
    }


}
});
//end


//start of username
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
             //$("#statuspass").html(<font color="red" style="margin-left:125px;">msg<strong></strong> .</font>);
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
//end of username

//start of email
$(document).ready(function(){

$("#email").change(function() { 

var usrN = $("#email").val();

if(usrN.length >= 5)
{
    $("#emailpass").html(' Checking ...');

    $.ajax({  
        type: "get",  
        url : "checkemail", 
        data:{
            email:usrN,
        },
        success: function(errorString){ 
            debugger;
            var parsedJson = jQuery.parseJSON(response);
            var errorString = '';
            $.each( parsedJson.errors, function( key, value) {
            errorString += '<li>' + value + '</li>';
        });
        $('#emailpass').html(errorString)

       //$('#emailpass').html(errorString); 
            //$("#statuspass").html(msg);
             //$("#statuspass").html(<font color="red" style="margin-left:125px;">msg<strong></strong> .</font>);
        }
    });
} else
    {
        $("#emailpass").html('<font color="red" style="margin-left:125px;">Please enter a valid email address<strong></strong> .</font>');
        $("#email").removeClass('object_ok'); 
        $("#email").addClass("object_error");
    }

});

});
//endofemail
