

$(document).on('click', '.button-edit', function(){
    

    $("#name"+this.name).hide();
    $("#price"+this.name).hide();
    $("#edit"+this.name).hide();

    $("#"+this.name).show();
    $("#nameChange"+this.name).show();
    $("#priceChange"+this.name).show();
    $("#delete"+this.name).show();
    

    
    
    
   
});

$(document).on('click', '.button-change', function(){
    let url = window.location.href;
    let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    
    let id = parseInt(this.id);
    let examinationName = $("#nameChange"+id).val();
    let price = parseFloat($("#priceChange"+id).val()).toFixed(2);
    
    console.log(examinationName);
    console.log(price);
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
            id: id,
            examinationName: examinationName,
            price: price,
        })
    })
    .then((data) => {
        if(data.ok){
            location.reload();
          } else {
            alert('Wystąpił błąd podczas zmiany danych');
          }
       
    })
    .catch(function(error) {
        console.log(error);
    });


});
$(document).on('click', '.button-delete', function(){
    let url = window.location.href;
    let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    
    let id = parseInt(this.name);
    
    fetch(url, {
        headers: {
            "Content-Type": "application/json",
            "Accept": "application/json, text-plain, */*",
            "X-Requested-With": "XMLHttpRequest",
            "X-CSRF-TOKEN": token
            },
        method: 'delete',
        credentials: "same-origin",
        body: JSON.stringify({
            id: id,
            
        })
    })
    .then((data) => {
        if(data.ok){
            // window.location.href = window.location.href;
            location.reload();
          } else {
            alert('Wystąpił błąd podczas zmiany danych');
          }
       
    })
    .catch(function(error) {
        console.log(error);
    });


});

