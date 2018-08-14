$(document).ready(function(){
    $('.thongbaoloi').delay(4000).slideUp();
});

function xacnhanxoa(msg){
    if(window.confirm(msg)){
        return true;
    }
    return false;
}

$(document).ready(function(){
	$("a#del_img_demo").on('click',function(){
		var url = "http://localhost:8000/backend/san-pham/xoaanh/";
		var _token = $("form[name='frmEditProduct']").find("input[name='_token']").val();
        var idHinh = $(this).parent().find("img").attr("idHinh");
        // alert(idHinh); 
		var img = $(this).parent().find("img").attr("src");
		var rid = $(this).parent().find("img").attr("id");
		$.ajax({
			url: url + idHinh,
			type: 'GET',
			cache: false,
			data: {"idHinh":idHinh},
			success: function(data){
				if(data=="OK"){
					$("#"+rid).remove();
				}else{
					alert("Lỗi rồi");
				}
			}
		});
	});
});

$(document).ready(function(){
	$('#addImages').click(function(){
		$('#insert').append('<div class="form-group"><input class="form-control" type="file" name="fEditDetail[]" /></div>');// ko dc xuống dòng
	});
	$('#calendar').datepicker().datepicker("setDate", new Date());
});