$(document).ready(()=>{
   $(".act").click(()=>{
    $(".form").show();
   })
   $("#exp").click(()=>{
      $(".formexp").show()
   })
   $(".close").click(()=>{
    $(".form,.formu,.formexp").hide();
   })
   $("#print").click(()=>{
      $("#print,.h").hide()
      $("body").html($("table"))
      print()
   })
        $(".print").click(()=>{
         $("table").prepend($(".head"))
         $(".head").css("font-size","20px")
            let a = document.querySelector('.table')
           
            html2pdf().from(a).save()
           })
        
})