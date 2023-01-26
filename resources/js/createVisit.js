
var options = $("#doctor").map(function() {
    return $(this).val();
}).get();
$("#tbody"+options).show();




function setTimepicker(){
    var options = $("#doctor").map(function() {
        return $(this).val();
    }).get();
    var open = $("[name='open"+options+"']").map(function() {
        return this.value;
      }).get();
    
    var close = $("[name='close"+options+"']").map(function() {
        return this.value;
      }).get();
    var days = $("[name='day"+options+"']").map(function() {
        return this.value;
      }).get();
    
    
    for(let i =0; i<days.length;i++){
    
        $('.timepicker'+options+days[i]).timepicker({
            timeFormat: 'HH:mm',
            interval: 30,
            minTime: open[i],
            maxTime: close[i],
            dynamic: false,
            dropdown: true,
            scrollbar: true
        });
    }

}
setTimepicker();



$(document).on('change','#doctor',function(){
   
    $(".tbody").hide();
    var options = $("#doctor").map(function() {
        return $(this).val();
    }).get();
    console.log(options);
    $("#tbody"+options).show();
    setTimepicker();
    

});


// $(document).on('click', '.button-edit', function(){
//     let url = window.location.href;
//     let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

//     let id = this.name;
//     let date = $("#date"+this.id).val();;
//     let hour = $("#hour"+this.id).val();
//     console.log(id);
//     console.log(date);
//     console.log(hour);
//     date = new Date(date);
//     console.log(date);

//     fetch(url, {
//         headers: {
//             "Content-Type": "application/json",
//             "Accept": "application/json, text-plain, */*",
//             "X-Requested-With": "XMLHttpRequest",
//             "X-CSRF-TOKEN": token
//             },
//         method: 'post',
//         credentials: "same-origin",
//         body: JSON.stringify({
//             id: id,
//             date: date,
            
//         })
//     })
//     .then((data) => {
//         if(data.ok){
//             location.reload();
//           } else {
//             alert('Wystąpił błąd podczas zamówienia wizyty');
//           }
       
//     })
//     .catch(function(error) {
//         console.log(error);
//     });



// });