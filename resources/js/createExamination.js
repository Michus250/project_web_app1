

$(document).on('click', '.button-edit', function(){
    

    $("#name"+this.name).hide();
    $("#price"+this.name).hide();
    $("#edit"+this.name).hide();

    $("#"+this.name).show();
    $("#nameChange"+this.name).show();
    $("#priceChange"+this.name).show();

    
    
    
   
});

$(document).on('click', '.button-change', function(){
    let url = window.location.href;
    let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    console.log(this.id);
    // fetch(url, {
    //     headers: {
    //         "Content-Type": "application/json",
    //         "Accept": "application/json, text-plain, */*",
    //         "X-Requested-With": "XMLHttpRequest",
    //         "X-CSRF-TOKEN": token
    //         },
    //     method: 'post',
    //     credentials: "same-origin",
    //     body: JSON.stringify({
    //         id: id,
    //         status: status
    //     })
    // })
    // .then((data) => {
    //     window.location.href = window.location.href;
       
    // })
    // .catch(function(error) {
    //     console.log(error);
    // });


});

