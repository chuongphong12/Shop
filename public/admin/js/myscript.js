$(document).ready(function() {
    $('#dataTables-example').DataTable({
            responsive: true
    });
});
$("div.alert").delay(3000).slideUp();

function xacnhanxoa(msg){
	if (window.confirm(msg)) {
		return true;
	}
	return false;
};

$(document).ready(function(){
	$("a#del_img_detail").on('click',function(){
		var url = "http://localhost:8080/shopthoitrang/admin/products/delimg/";
		var _token = $("form[name = 'fProductDetail']").find("input [name = '_token']").val();
		var idPic = $(this).parent().find('img').attr("idPic");
		var img = $(this).parent().find('img').attr("src");
		var rid = $(this).parent().find('img').attr("id");
	
		$.ajax({
			url: url + idPic,
			type:'GET',
			cache: false,
			data: {"_token":_token,"idPic":idPic,"urlPic":img},
			success:function(data){
				if (data == "Oke") {
					$("#"+rid).remove();
				}
				else{
					alert(Errors );
				}
			}
		});
	})
});
