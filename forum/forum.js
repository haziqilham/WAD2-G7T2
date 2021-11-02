function showThread() {
    document.getElementById('hide1').style.display = "none";
    document.getElementById('hide2').style.display = "none";
    document.getElementById('hide3').style.display = "none";
    document.getElementById('new').style.display = 'block';
    // document.getElementById('categorydownMenuButton').style.display ='none';
    console.log("this is right")

}

function unhide() {
    document.getElementById('hide1').style.display = "block";
    document.getElementById('hide2').style.display = "block";
    document.getElementById('hide3').style.display = "block";
    document.getElementById('new').style.display = 'none';
    console.log("this is right again");

    var input1 = document.getElementById('username').value
    var input2 = document.getElementById('threadName').value
    var input3 = document.getElementById('category').value
    var input4 = document.getElementById('input').value


    var table = document.getElementById('content')
    console.log(table)

    var row = table.insertRow(-1);

    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);
    var cell4 = row.insertCell(3);
    var cell5 = row.insertCell(4);
    var cell6 = row.insertCell(5);

    var tbodyRowCount = table.tBodies[0].rows.length;
    
    

    const months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

    const d = new Date();
    let month = months[d.getMonth()];
    month = month.substring(0,3);

    let day = d.getDay();

    cell1.innerHTML = "<b>" + tbodyRowCount + "</b>";
    cell2.innerHTML = day + " " + month
    cell3.innerHTML = input1 
    cell4.innerHTML = input2 
    cell5.innerHTML = input4

    


    

    
}