import './bootstrap';



var button = document.getElementsByName('changeButton')
// button.onclick = function() {
//     alert('wcisnieto przycisk');
//     console.log($this);
// };

// button.addEventListener('click', function() {
//     alert(document.getElementsByName("changeButton").length);
// }, false);

// button.addEventListener('mouseover', function() {
//     alert('a to funkcja mouse');
// }, false);

let url = window.location.href;
let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

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
            // window.location.href = '/project_web_app1/public/createUser';   //tu trzeba ogarnąć o co chodzi i będzie git
        })
        .catch(function(error) {
            console.log(error);
        });



        // let data =`{
        //     'id': this.id,
        //     'status': document.getElementsByName("status")[i].value, 
        // }`;
        // alert(window.location.href);
        
       
    }, false);
}

