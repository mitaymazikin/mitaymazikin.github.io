$(document).ready(function(){
    $("#inputPhone").mask("+7(999) 999-99-99");
    //начало календаря
    $( "#inputDate" ).datepicker({
        monthNames: ['Январь', 'Февраль', 'Март', 'Апрель',
            'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь',
            'Октябрь', 'Ноябрь', 'Декабрь'],
        dayNamesMin: ['Вс','Пн','Вт','Ср','Чт','Пт','Сб'],
        firstDay: 1,
    });
    //конец календаря

    //ползунок
    $( function() {
        var handle = $( "#custom-handle" );
        $( "#slider" ).slider({
            create: function() {
                handle.text( $( this ).slider( "value" ) );
            },
            slide: function( event, ui ) {
                handle.text( ui.value );
            }
        });
    } );

    //проверка ошибок
    /*$('#toForm').submit(function(e){
        var newform = new FormData( document.querySelector);
        $.ajax({
            url: 'php/check.php',
            data: newform,
            cache: false,
            processData: false,
            contentType: false,
            type: 'POST',
            dataType: 'JSON',
            success: function (data) {
                console.log(newform);
            }
        });

    });*/


    toForm.onsubmit = async (e) => {
        e.preventDefault();

        let response = await fetch('/php/check.php', {
            method: 'POST',
            body: new FormData(toForm)
        });

        let result = await response.json();

        console.log(result);
    };


    /*$("#toForm").submit(function(){
      var dataCallback = $(this).serialize();

      //console.log(dataCallback);
      console.log(dataCallback);

      var action = $(this).attr('action');
      if (dataCallback && action) { //проверка не до конца корректна
          $.ajax({
            type: "POST",
            url: action,
            data: dataCallback,
            success: function(out){
              console.log(out);
            }
          });
        };
        return false;
      });*/


});