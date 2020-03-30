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

    $("#inputPhone").mask("+7 (999) 999 99 99");


    //Обработка данных с сервера
toForm.onsubmit = async (e) => {
        e.preventDefault();

        let response = await fetch('/php/check.php', {
            method: 'POST',
            body:   new FormData(toForm),
        });

        let result = await response.json();
        let errors = $("#errors");
        let success = $("#success");

        result.timeout = 120000;
        console.log(result);

        if (response.ok) {
            grecaptcha.ready(function() {
                grecaptcha.execute('6Lf_LOIUAAAAALGzJItq9XRKUBYV6Eh56TUCwauR', {action: 'homepage'}).then(function(token) {
                    //console.log(token);
                    document.getElementById('g-recaptcha-response').value=token;
                });
            });
            if (result.length > 0) {
                let str = '';
                $.each(result, function (index,value){
                    errors.html(str += value +'<br>');
                });
                }else {
                    $("#toForm").hide();
                    success.html('Спасибо! Данные успешно отправлена');
                }
            }else {
                alert("Ошибка HTTP: " + response.status);
        }
    };
    //Конец обработки данных
});
