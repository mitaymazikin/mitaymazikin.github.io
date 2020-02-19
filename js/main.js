$(document).ready(function(){
    $( "#inputDate" ).datepicker({
        monthNames: ['Январь', 'Февраль', 'Март', 'Апрель',
            'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь',
            'Октябрь', 'Ноябрь', 'Декабрь'],
        dayNamesMin: ['Вс','Пн','Вт','Ср','Чт','Пт','Сб'],
        firstDay: 1,
    });

    $("#inputPhone").mask("+7 (999) 99-99-999");

    //Обработка данных с сервера
    toForm.onsubmit = async (e) => {
        e.preventDefault();

        let response = await fetch('/php/check.php', {
            method: 'POST',
            body:   new FormData(toForm)
        });

        let result = await response.json();

        console.log(result);
    };
    //Конец обработки данных
});
