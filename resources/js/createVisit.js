
var options = $("#doctor").map(function() {
    return $(this).val();
}).get();
$("#tbody"+options).show();



var blockedHours = $("#blockedHours").val();
blockedHours = JSON.parse(blockedHours);
var blockedDays = $("#blockedDays").val();
blockedDays = JSON.parse(blockedDays);
console.log(blockedHours);
console.log(blockedDays);



function setSelectOptions(){
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
    var dates = $("[name='date"+options+"']").map(function() {
        return this.value;
    }).get();
    var forms = $("[name='form"+options+"']").map(function() {
        return this;
    }).get();
   
    var className = '.date' + options;
    // var dateExamination = $(className);

      var timeDiv = $("[name='time"+options+"']").map(function() {
        return this;
    }).get();
    
  

    let intNumber = parseInt(options);
    var date;
    var dateWithHours;
    for(let i =0; i<days.length;i++){
        let arr=[];
        for(let j=0;j<blockedDays[intNumber].length;j++){
            if(dates[i] == blockedDays[intNumber][j]){
                arr.push(blockedHours[intNumber][j]);
            }
        }
            if (arr.length == 0){
                arr.push(" ");
            }
            date = dates[i];
            // var td = $('<td class="align-middle col-3"></td>');
            // var select = $('<select class ="form-control col-3" name="dateJs id="dateJs'+days[i]+options+'"></select>');
            var zm = "#select"+days[i]+options;
            var select= $(zm);
            var openSeperate = open[i].split(':');
            var closeSeperate = close[i].split(':');
            var openInt = parseInt(openSeperate[0]);
            var closeInt = parseInt(closeSeperate[0]);
            var option;
            var addOption;
            var hourString;
            
            if (openSeperate[1] == '00'){
                while (openInt < closeInt){
                    if(openInt < 10){
                        hourString = "0"+openInt+':'; 
                    }
                    else{
                        hourString = openInt+':';
                    }
                    option = hourString + "00";
                    if(option != arr[0]){
                        dateWithHours = date+" "+option+":00";
                        addOption = $('<option value="'+dateWithHours+'">'+option+'</option>');
                   

                        select.append(addOption);
                    }
                    else{
                        arr.shift();
                        if(arr.length == 0){
                            arr.push(" ");
                        }
                    }
                    
                    
                    option = hourString + "30";
                    if(option != arr[0]){
                        dateWithHours = date+" "+option+":00";
                        addOption = $('<option value="'+dateWithHours+'">'+option+'</option>');
                   

                        select.append(addOption);
                    }
                    else{
                        arr.shift();
                        if(arr.length == 0){
                            arr.push(" ");
                        }
                    }

                   
                    openInt++;
                }
                if(closeSeperate[1] == '30'){
                    if(openInt < 10){
                        hourString = "0"+openInt+':30'; 
                    }
                    else{
                        hourString = openInt+':30';
                    }
                    if(option != arr[0]){
                        dateWithHours = date+" "+option+":00";
                        addOption = $('<option value="'+dateWithHours+'">'+option+'</option>');
                   

                        select.append(addOption);
                    }
                    else{
                        arr.shift();
                        if(arr.length == 0){
                            arr.push(" ");
                        }
                    }
                    
                }
                
            }
            if (openSeperate[1] == '00'){
                if(openInt < 10){
                    hourString = "0"+openInt+':'; 
                }
                else{
                    hourString = openInt+':';
                }
                option = hourString + "30";
                if(option != arr[0]){
                    dateWithHours = date+" "+option+":00";
                    addOption = $('<option value="'+dateWithHours+'">'+option+'</option>');
               

                    select.append(addOption);
                }
                else{
                    arr.shift();
                    if(arr.length == 0){
                        arr.push(" ");
                    }
                }

                

                while (openInt < closeInt){
                    if(openInt < 10){
                        hourString = "0"+openInt+':'; 
                    }
                    else{
                        hourString = openInt+':';
                    }
                    option = hourString + "00";
                    if(option != arr[0]){
                        dateWithHours = date+" "+option+":00";
                        addOption = $('<option value="'+dateWithHours+'">'+option+'</option>');
                   

                        select.append(addOption);
                    }
                    else{
                        arr.shift();
                        if(arr.length == 0){
                            arr.push(" ");
                        }
                    }

                   


                    option = hourString + "30";

                    if(option != arr[0]){
                        dateWithHours = date+" "+option+":00";
                        addOption = $('<option value="'+dateWithHours+'">'+option+'</option>');
                   

                        select.append(addOption);
                    }
                    else{
                        arr.shift();
                        if(arr.length == 0){
                            arr.push(" ");
                        }
                    }
                   
                    openInt++;
                }
                if(closeSeperate[1] == '30'){
                    if(openInt < 10){
                        hourString = "0"+openInt+':30'; 
                    }
                    else{
                        hourString = openInt+':30';
                    }
                    if(option != arr[0]){
                        dateWithHours = date+" "+option+":00";
                        addOption = $('<option value="'+dateWithHours+'">'+option+'</option>');
                   

                        select.append(addOption);
                    }
                    else{
                        arr.shift();
                        if(arr.length == 0){
                            arr.push(" ");
                        }
                    }
                  
                }
                
            }
           
              
      
            
        

    }


}

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
    var dates = $("[name='date"+options+"']").map(function() {
        return this.value;
      }).get();
    console.log(dates);
    
    let intNumber = parseInt(options);
    console.log(blockedDays[intNumber]);
    console.log(intNumber);
    for(let i =0; i<days.length;i++){
        let arr=[];
        for(let j=0;j<blockedDays[intNumber].length;j++){
            if(dates[i] == blockedDays[intNumber][j]){
                arr.push(blockedHours[intNumber][j]);
            }
            
        }
        console.log(arr);
        $('.timepicker'+options+days[i]).timepicker({
            timeFormat: 'HH:mm',
            interval: 30,
            minTime: open[i],
            maxTime: close[i],
            disabledHours: arr,
            dynamic: false,
            dropdown: true,
            scrollbar: true
        });
    }

}
setSelectOptions();
setTimepicker();




$(document).on('change','#doctor',function(){
   
    $(".tbody").hide();
    var options = $("#doctor").map(function() {
        return $(this).val();
    }).get();
    console.log(options);
    $("#tbody"+options).show();
    setTimepicker();
    setSelectOptions();
    

});


