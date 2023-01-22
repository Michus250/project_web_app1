$('.timepicker').timepicker({
    timeFormat: 'HH:mm',
    interval: 30,
    minTime: '00:00',
    maxTime: '23:30',
    dynamic: false,
    dropdown: true,
    scrollbar: true
});


var open = $('input[name="open"]');


for (let i = 0; i <open.length ; i++){
    $('.checkbox').eq(i).on("change",function() { 
        if(this.checked) {
            $('.open').eq(i).prop("disabled", false);              
            $('.close').eq(i).prop("disabled", false);
        } else {
            $('.open').eq(i).prop("disabled", true);
            $('.close').eq(i).prop("disabled", true);
        }
    });
}
