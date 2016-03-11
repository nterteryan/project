$( document ).ready(function() {
    $(".closedTariff").on("click",function(event){
        event.preventDefault();
        tr  = $(this);
        var url = "/user/Investment/paiding";
        var closedTariffId = $(this).data("id");
        $.ajax({
            url: url,
            type: 'POST',
            dataType: 'json',
            data: {closedTariffId:closedTariffId},
            success: function(mes) {
                if(!mes.error){
                    tr.parents('tr').remove();
                    console.log(tr.parents('tr'));
                }
            }
        })
    })

    this.id;
    this.amount;
    this.percent;
    this.close_month;
    $(".btn_tariff").on("click",function(event){
         window.id = $(this).data("id");
         window.amount = $(this).data("amount");
         window.percent = $(this).data("percent");
         window.close_month = $(this).data("close_month");
    })
    $("#btn_modalTr").on("click",function(event){
        event.preventDefault();
        var url = "/user/Investment/addUser";
        var id = window.id;
        var amount = window.amount;
        var percent = window.percent;
        var close_month = window.close_month;
        var pin = $("#sendPin").val();
        $.ajax({
            url: url,
            type: 'POST',
            dataType: 'json',
            data: {id:id,amount:amount,pin:pin,percent:percent,close_month:close_month},
            success: function(mes) {
                $("#sendPin").val("");
                console.log(mes);
                if(!mes.error){
                    html ='<div class="alert alert-success">';
                        html += "success";
                    html += '</div>';
                    $("#danger").html(html);
                }else{
                    html ='<div class="alert alert-danger">';
                    html += mes.error;
                    html += '</div>';
                    if(mes.amountAdd){
                        html += '<div class="col-xs-12 margin-bottom-10"><a href="/user/finance" class="btn btn-success" >Add amount </a></div>';
                    }
                    $("#danger").html(html);
                }
            }
        })
    })
})
console.log("%cОстановитесь! %s", "color:red;font-size: 50pt", '');
console.log("%cЭта функция браузера предназначена для разработчиков. Если кто-то сказал вам скопировать и вставить что-то здесь, чтобы включить функцию Domblaga или «взломать» чей-то аккаунт, это мошенники. Выполнив эти действия, вы предоставите им доступ к своему аккаунту Domblaga. %s", "color:#000;font-size: 15pt", '');