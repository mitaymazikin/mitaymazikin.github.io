$(document).ready(function(){
    $("#inputPhone").mask("+7(999) 999-99-99");

    $( "#inputDate" ).datepicker({
      monthNames: ['Январь', 'Февраль', 'Март', 'Апрель',
      'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь',
      'Октябрь', 'Ноябрь', 'Декабрь'],
      dayNamesMin: ['Вс','Пн','Вт','Ср','Чт','Пт','Сб'],
      firstDay: 1,
    });

/*$('#submit').on('click',function(){
  var fio = $('#inputFio').val().trim();
  var phone = $('#inputPhone').val().trim();
  var email = $('#inpuEmail').val().trim();
  var file = $('#exampleFormControlFile1').val();
  var inputDate = $('#inputDate').val();
  var inputRange = $('#inputRange').val();
  var recaptcha = $('#recaptchaError').val();

  if(fio == "") {
    $('.errors').text("Заполните поле: ФИО");
    return false;
  }else if (email == "" ){
    $('.errors').text("Заполните поле: Email");
    return false;
  }else if (phone == "" ){
    $('.errors').text("Заполните поле: Номер телефона");
    return false;
  }


  $.ajax({
    url: 'php/check.php',
    type: 'POST',
    cahe: false,
    data: { 'fio': fio,'phone': phone,'email': email, 'file': file, 'inputRange': inputRange, 'recaptcha': recaptcha}
    dataType: 'html',
    beforeSend: function(){
        $('#submit').prop('disabled', true);
    },
    success: function(data) {
      
    }

  });
});*/



$( "#sliderRange" ).slider({
      range: true,
      min: 0,
      max: 100,
      values: [ 0 ],
      slide: function( event, ui ) {
        $( "#amount" ).val( "" + ui.values[ 0 ] + " - " + ui.values[ 1 ] );
      }
    });
    $( "#amount" ).val( "" + $( "#sliderRange" ).slider( "values", 0 ) +
      " - " + $( "#sliderRange" ).slider( "values", 1 ) );
$("#toForm").submit(function(){
  var dataCallback = $(this).serialize();
  var action = $(this).attr('action'); 
  var file_data = $('#files').prop('files')[0];
  if( typeof files == 'undefined' ) return;
  var form_data = new FormData();
  form_data.append('file', file_data);
  if (dataCallback && action) {
      $.ajax({
        type: "POST",
        url: action,
        data: dataCallback,
        cache: false,
        success: function(out){
          if(out.indexOf('errors') > 0){
            console.log(file_data);
            $("#toForm .errors").html(out);
          }else{
             $('#toForm').slideUp(100);
           }
        }
      });
  }; 
  return false;
});


});