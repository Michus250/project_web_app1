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
$("#form").on("submit", function(){
    let url = window.location.href;
    let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    $('.checkbox').prop("checked","true");
    e.preventDefault();
    var open = $(".open").val();
    var close = $(".close").val();
    var isWorking = $('.checkbox').val();


    fetch(url, {
        headers: {
            "Content-Type": "application/json",
            "Accept": "application/json, text-plain, */*",
            "X-Requested-With": "XMLHttpRequest",
            "X-CSRF-TOKEN": token
            },
        method: 'post',
        credentials: "same-origin",
        body: JSON.stringify({
            open: open,
            close: close,
            isWorking: isWorking,
        })
    })
    .then((data) => {
        window.location.href = window.location.href;
       
    })
    .catch(function(error) {
        console.log(error);
    });
    

    return false;
});

for (let i = 0; i <7 ; i++){
    $('.checkbox').eq(i).on("change",function() { 
        console.log(i);
        if(this.checked) {
            $('.open').eq(i).prop("type", "text");              
            $('.close').eq(i).prop("type", "text");
            $('.checkbox').eq(i).prop("value","true");
        } else {
            $('.checkbox').eq(i).prop("value","false");
            $('.open').eq(i).prop("type", "hidden");
            $('.close').eq(i).prop("type", "hidden");
        }
    });
}
