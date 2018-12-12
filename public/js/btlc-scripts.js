//делает недоступным ввод даты контракта, исполнителя, условий оплаты, если отсутствует номер контракта

$("#validationCustom03").on("change keyup paste click", function(){
    if($("#validationCustom03").val() != '')
    {
        $("#validationCustom04").attr('disabled', false);
        $("#validationCustom07").attr('disabled', false);
    }else{
        $("#validationCustom04").attr('disabled', true);
        $("#validationCustom07").attr('disabled', true);
    }
});
