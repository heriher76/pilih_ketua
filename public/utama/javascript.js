$(document).ready(function(){
  $(".pilih").click(function(){
  	$(".pilih").css("background","black");
    $(this).css("background","green");
    $(".lanjut").css("visibility","visible");
    $(".selesai").css("visibility","visible");
  });

  $(".lanjut").click(function() {
  	$(".rt").css("display","none");
  	$(".rw").css("display","block");
  	 $(".selesai").css("visibility","hidden");
  });


  $('.btn-rt').click(function() {
  	 $('.btn-rt').css({"background-color":"white","color":"black","z-index" : "2"});
  	 $('.btn-rw').css({"background-color":"black","color":"white","z-index" : "1"});
  	  $('.p-rw').addClass(' hilang');
  	 $('.p-rt').removeClass('hilang');
  	  $('.chart-rw').addClass(' hilang');
  	 $('.chart-rt').removeClass('hilang');

  });
  $('.btn-rw').click(function() {
  	 $('.btn-rw').css({"background-color":"white","color":"black","z-index" : "2"});
  	 $('.btn-rt').css({"background-color":"black","color":"white","z-index" : "1"});
  	 $('.p-rt').addClass(' hilang');
  	 $('.p-rw').removeClass('hilang');
  	 $('.chart-rt').addClass(' hilang');
  	 $('.chart-rw').removeClass(' hilang');

  });
  $('#selesai').click(function() {
    $(".rw").css("display","none");
    $('.thank').removeClass('hilang');
    // setTimeout("location.href = 'https://www.facebook.com';",1500);
  });
});