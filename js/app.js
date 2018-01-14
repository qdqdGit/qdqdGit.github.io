$(document).ready(function(){

    var text = $('#text').val();
    var name = localStorage.getItem('IDU12399');

    $("input[name='A']").click(function(){
        $("input[type='radio'][name='"+$(this).attr('name')+"']").parent().removeClass("A");
         $(this).parent().addClass("A");
    })

    $("input[name='B']").click(function(){
        $("input[type='radio'][name='"+$(this).attr('name')+"']").parent().removeClass("A");
         $(this).parent().addClass("A");
    })
    $("input[name='C']").click(function(){
        $("input[type='radio'][name='"+$(this).attr('name')+"']").parent().removeClass("A");
         $(this).parent().addClass("A");
    })

    $(".md-close").click(function(){
        $("#D").hide();
    });

    $("#Abut").click(function(){

        
        var locaSto = ('localStorage' in window);
         if(locaSto){
            if(name){
                $("#D p").html('已经提交过');
                $("#D").show($('input[name="A"]:checked').val());
            }else{
               localStorage.setItem('IDU12399',text);
               /*console.log($('input[name="A"]:checked').val());*/
               
                $.ajax({
                   url: "https://qdqd.site/query.php",
                   dataType: 'jsonp',
                   jsonp : "callback",
                   jsonpCallback:"test1",
                   data:{
                       F_N:$('#A input[name="A"]:checked').val()
                       }
                     ,

                  success: function(data) {
                      console.log(data);
                     if(data.message == 'ok'){
                         $("#A").hide();
                         $("#B").show();
                     }else{
                         $("#D p").html('所选单位提交人数已满！');
                         $("#D").show();
                     }
                  },
                 error:function(e){
                    $("#D p").html('错误');
                    $("#D").show();
                 }
               });
            }
        }else{
            alert('该浏览器不支持');
        }
    });

    $("#Bbut").click(function(e){
        e.preventDefault();
        
        $.ajax({
            url: "https://qdqd.site/add.php",
            dataType: 'jsonp',
            data:{
                F_N:$('input[name="A"]:checked').val(),
                S_F:$('input[name="B"]:checked').val(),
                P_F:$('input[name="C"]:checked').val(),
                B_Z:$('textarea[name="text"]').val()
                }
        });
        $("#C").show();
    });

})

function XCX(){
    $("#B").hide();
    $("#A").show();
    $("#C").hide();
}