let url = window.location.href;
let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
let button = document.getElementsByName("changeButton")

for (let i = 0; i <document.getElementsByName("changeButton").length ; i++){
    button[i].addEventListener('click', function() {
        let id = button[i].id;
        let status = document.getElementsByName("status")[i].value
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
                status: status
            })
        })
        .then((data) => {
            window.location.href = window.location.href;
           
        })
        .catch(function(error) {
            console.log(error);
        });



       
        
       
    }, false);
}