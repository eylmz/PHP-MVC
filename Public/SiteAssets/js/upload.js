$(document).ready(function()
{
	 $("body").on("click",".dosyaSil",function(){
		var dosyaID = $(this).attr("id");
		var siteAdres = $(this).attr("href");

		$.ajax({
			type: 'POST',
			url: siteAdres+'ajax/dosyasil',
			data: {'dosyaID' : dosyaID},
			dataType: 'json',
			success: function(res) {
				if(res.hata){
					alert(res.hata);
				}else{
					$("#"+dosyaID).parent().slideToggle(400);
				}
				
			}
		});
		return false;
	 });	
	 
	 $("#urlekle").ajaxForm({
		success: function (res) {
			res = jQuery.parseJSON(res);
			if(res.hata){
				alert(res.hata);
			}else{
				var mesaj = "<li class=\"list-group-item\"><span class=\"glyphicon glyphicon-link\"></span> " + res.link + "<a class=\"pull-right urlsil\" href=\""+res.siteAdres+"\" data=\"" + res.linkID + "\"  data-toggle=\"tooltip\" data-placement=\"top\" title=\"URL i Sil\"><span class=\"glyphicon glyphicon-remove\"></span></a></li>";
				$("#eklenenURL").append(mesaj);
				$('#url').val('');
			}
		}
	});
	
	$("#uyeekle").ajaxForm({
		success: function (res) {
			res = jQuery.parseJSON(res);
			if(res.hata){
				alert(res.hata);
			}else{
				var mesaj = "<li class=\"list-group-item\"><span class=\"glyphicon glyphicon-link\"></span> " + res.eposta + "<a class=\"pull-right uyesil\" href=\""+res.siteAdres+"\" data2=\"" + res.userID + "\"  data-toggle=\"tooltip\" data-placement=\"top\" title=\"Üye i Sil\"><span class=\"glyphicon glyphicon-remove\"></span></a></li>";
				$("#eklenenUye").append(mesaj);
				$('#uye').val('');
			}
		}
	});
	
	$("body").on("click", ".uyesil", function () {
		var userID = $(this).attr("data2");
		var siteAdres = $(this).attr("href");
		$.ajax({
			type: 'POST',
			url: siteAdres + 'ajax/uyesil',
			data: { 'userID': userID },
			dataType: 'json',
			success: function (res) {
				if (res.hata) {
					alert(res.hata);
				} else {
					$("a[data2=" + userID+"]").parent().slideToggle(400);
				}

			}
		});
		return false;
	});
	
	$("body").on("click", ".urlsil", function () {
		var linkID = $(this).attr("data");
		var siteAdres = $(this).attr("href");
		$.ajax({
			type: 'POST',
			url: siteAdres + 'ajax/urlsil',
			data: { 'linkID': linkID },
			dataType: 'json',
			success: function (res) {
				if (res.hata) {
					alert(res.hata);
				} else {
					$("a[data=" + linkID+"]").parent().slideToggle(400);
				}

			}
		});
		return false;
	});
	 
     $("#dosyayukle").ajaxForm({
        beforeSend: function() 
        {
            $(".progress").show();
            //clear everything
            $(".progress-bar").width('0%');
            $("#mesaj").html("");
            $(".progress-bar").html("0%");
        },
        uploadProgress: function(event, position, total, percentComplete) 
        {
            $(".progress-bar").width(percentComplete+'%');
            $(".progress-bar").html(percentComplete+'%');
 
        },
        success: function(res) 
        {
			var res = jQuery.parseJSON(res);
			if(res.hata){
				$("#mesaj").html("<font color='red'>"+res.hata+"</font>");
			}else{
				$("#mesaj").html("<font color='green'>Dosya başarıyla eklendi</font>");
				var mesaj = "<li class=\"list-group-item\"><a target=\"_blank\" href=\""+res.dosyaAdres+"\"> <span class=\"glyphicon glyphicon-user\"></span> "+res.dosyaAdi+"</a><a class=\"pull-right dosyaSil\" href=\""+res.siteAdres+"\" id=\"dosyaSil-"+res.dosyaID+"\" class=\"dosyaSil\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Dosyayı Sil\"><span class=\"glyphicon glyphicon-remove\"></span></a></li>";
				$("#eklenenDosyalar").append(mesaj);

			}
            $(".progress-bar").width('100%');
            $(".progress-bar").html('100%');
        },
        complete: function(response) 
        {
			
			
        },
        error: function()
        {
            $("#mesaj").html("<font color='red'> Bir hata oluştu</font>");
 
        }
    });
 
});