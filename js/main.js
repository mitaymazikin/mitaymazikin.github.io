$(document).ready(function(){
    $("#maskPhone").mask("+7(999) 999-99-99",{
    completed: function(){ alert("Вы ввели номер: " + this.val()); }
  });








});