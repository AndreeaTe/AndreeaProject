// AJAX call for autocomplete 
$(document).ready(function(){
	$("#nameCompany").keyup(function(){
		$.ajax({
		type: "POST",
		url: "/autoComplete",
		data:{"_token":  $("input[name=_token]").val()},
		// beforeSend: function(){
		// 	$("#search-box").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
		// },
		success: function(data){
			$( "#nameCompany" ).autocomplete({
			      source: data,
			      select: function( event, ui ) {  
			      	var address = ui.item.value.address;
			      	$('#nameCompany').val(ui.item.label);
			      	$('#address').val(address);
			      	$('#phoneNumber').val(ui.item.value.phoneNumber);
			      	$('#fax').val(ui.item.value.fax);
			      	$('#idCompany').val(ui.item.value.id);
			      	$('#idPacient').val(ui.item.value.id);
            return false;
        }
		    });
			$("#suggesstion-box").show();
			$("#suggesstion-box").html(data);
			$("#nameCompany").css("background","#FFF");
		}
		});
	});
});


$("input:checkbox").click(function() {
    if ($(this).is(":checked")) {
        var group = "input:checkbox[name='" + $(this).attr("name") + "']";
        $(group).prop("checked", false);
        $(this).prop("checked", true);
    } else {
        $(this).prop("checked", false);
    }
});









// $( document ).ready(function() {
//     var availableTags = [
//       "ActionScript",
//       "AppleScript",
//       "Asp",
//       "BASIC",
//       "C",
//       "C++",
//       "Clojure",
//       "COBOL",
//       "ColdFusion",
//       "Erlang",
//       "Fortran",
//       "Groovy",
//       "Haskell",
//       "Java",
//       "JavaScript",
//       "Lisp",
//       "Perl",
//       "PHP",
//       "Python",
//       "Ruby",
//       "Scala",
//       "Scheme"
//     ];

//      $("#nameCompany").autocomplete({
//       source: availableTags
//     });
// });

//    $(document).ready(function() {
//     src = "{{ route('searchajax') }}";
//      $("#nameCompany").autocomplete({
//         source: function(request, response) {
//             $.ajax({
//                 url: src,
//                 dataType: "json",
//                 data: {
//                     term : request.term
//                 },
//                 success: function(data) {
//                     response(data);
                   
//                 }
//             });
//         },
//         minLength: 3,
       
//     });
// });