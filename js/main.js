$(document).ready(function(){
    $( "#inputDate" ).datepicker({
        monthNames: ['Январь', 'Февраль', 'Март', 'Апрель',
            'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь',
            'Октябрь', 'Ноябрь', 'Декабрь'],
        dayNamesMin: ['Вс','Пн','Вт','Ср','Чт','Пт','Сб'],
        firstDay: 1,
    });

    $("#polzunok").slider({
        animate: "slow",
        range: "min",
        value: 0,
        slide : function(event, ui) {
            $("#result-polzunok").text(ui.value);
            $("#send-result-polzunok").val(ui.value);
            $("#send-result-polzunok").val($("#polzunok").slider("value"));
        }
    });
    $( "#result-polzunok" ).text($( "#polzunok" ).slider( "value" ));

    $("#inputPhone").mask("+7 (999) 999 99 999");

    //Обработка данных с сервера
    $("#toForm").on('click',function(e){
            let dataCallback = $(this).serialize();
            let action ='/php/check.php';
            let errors = $("#errors");
            let success = $("#success");
            if (dataCallback && action) {
                $.ajax({
                    type: "POST",
                    url: action,
                    data: dataCallback,
                    contentType: 'application/json',
                    success: function(out){
                        out = JSON.parse(out);
                        if ( out.length > 0) {
                           $.each(out, function (index,value){
                               errors.html( value );
                               return false;
                           });
                        }else{
                            $("#toForm").hide();
                            success.html('Спасибо! форма успешно отправлена');
                        }

                    }
                });
            };
            return false;
});
/*toForm.onsubmit = async (e) => {
        e.preventDefault();

        let response = await fetch('/php/check.php', {
            method: 'POST',
            body:   new FormData(toForm)
        });

        let result = await response.json();
    console.log(result)
        if (result.length > 0) {
            result.forEach(function(item) {
                let  errors = document.getElementById("errors").innerHTML += item + "</br>";

                console.log(item)
            });
        }else {
            document.getElementById("toForm").style = 'display: none;';
            document.getElementById("success").innerHTML = 'Спасибо! Данные успешно отправлены.';
        }

    };*/
    //Конец обработки данных
});
