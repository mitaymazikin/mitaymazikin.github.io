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
toForm.onsubmit = async (e) => {
        e.preventDefault();

        let response = await fetch('/php/check.php', {
            method: 'POST',
            body:   new FormData(toForm)
        });

        let result = await response.json();
        let errors = $("#errors");
        let success = $("#success");

        if (result.length > 0) {
            let str = '';
                $.each(result, function (index,value){
                    errors.html(str += value +'<br>');
                    console.log(value);
                });
        }else {
            $("#toForm").hide();
            success.html('Спасибо! форма успешно отправлена');
        }

    };
    //Конец обработки данных
});
