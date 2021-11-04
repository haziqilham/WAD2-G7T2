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

function showComments() {
    console.log("This is right")
    document.getElementById('hide1').style.display = "none";
    document.getElementById('hide2').style.display = "none";
    document.getElementById('hide3').style.display = "none";
    

    var body = document.getElementById('replies');
    
    
    // body.innerHTML = "<h2>WAD2 Reflection</h2>" + 
    //                 "<div class='col-auto' style='padding-right:2px;'>" + "<a href='../web/index.html' style='color: black; text-decoration: none; font-size: medium;' <p>Home</p> </a> </div>"  + "<div class='col-auto' style='padding-left: 2px; padding-right:2px; font-size: medium; margin-left: 0;'> <p>></p> </div>" + "<span> ></span>"

    // body.innerHTML = "<h2>WAD2 Reflection</h2>" + " " + "<a href='../web/index.html' style='color:black; text-decoration: none;'>Home</a> > " + "<a href='../forum/forum2.html' style='color:black; text-decoration: none;'>Forum</a> >  "  + "<a href='../forum/forum2.html' style='color:black; text-decoration: underline;'>WAD2 Reflection</a>" + "<br>" 

    //var tbl = document.createElement('table')

    let table = document.createElement('table');
    let thead = document.createElement('thead');
    let tbody = document.createElement('tbody');

    table.appendChild(thead);
    table.appendChild(tbody);
    table.style.marginLeft = "25px";
    table.setAttribute('class', 'table')

    document.body.appendChild(table);


    let row_1 = document.createElement('tr');
    let heading_1 = document.createElement('th');
    heading_1.setAttribute('scope', 'col')
    heading_1.innerHTML = "#";
    let heading_2 = document.createElement('th');
    heading_2.innerHTML = "Username";
    let heading_3 = document.createElement('th');
    heading_3.innerHTML = "Comment";
    let heading_4 = document.createElement('th');
    heading_4.innerHTML = "Likes";
    let heading_5 = document.createElement('th');
    heading_5.innerHTML = "Dislikes";

    row_1.appendChild(heading_1);
    row_1.appendChild(heading_2);   
    row_1.appendChild(heading_3);
    row_1.appendChild(heading_4);
    row_1.appendChild(heading_5);
    thead.appendChild(row_1);


    let row_2 = document.createElement('tr');
    let row_2_data_1 = document.createElement('td');
    row_2_data_1.innerHTML = "<img src='../forum/up_arrow.png' style='height:30px;' onclick='incrementCounter();'>" + "<img src='../forum/down_arrow.png' onclick='decrementCounter();' style='height:50px;'>";
    let row_2_data_2 = document.createElement('td');
    row_2_data_2.innerHTML = "Chan Juun Kit";
    let row_2_data_3 = document.createElement('td');
    row_2_data_3.innerHTML = "I love Prof Shah for granting the extension";
    let row_2_data_4 = document.createElement('td');
    row_2_data_4.innerHTML = 0;
    row_2_data_4.setAttribute('id', 'likes_counter')
    row_2_data_4.setAttribute('type', 'number')
    let row_2_data_5 = document.createElement('td');
    row_2_data_5.innerHTML = 0;


    row_2.appendChild(row_2_data_1);
    row_2.appendChild(row_2_data_2);
    row_2.appendChild(row_2_data_3);
    row_2.appendChild(row_2_data_4);
    row_2.appendChild(row_2_data_5);
    tbody.appendChild(row_2);


    // Creating and adding data to second row of the table
    let row_3 = document.createElement('tr');
    let row_3_data_1 = document.createElement('td');
    row_3_data_1.innerHTML = "1.";
    let row_3_data_2 = document.createElement('td');
    row_3_data_2.innerHTML = "Chan Juun Kit";
    let row_3_data_3 = document.createElement('td');
    row_3_data_3.innerHTML = "I love Prof Shah for granting the extension";
    let row_3_data_4 = document.createElement('td');
    row_3_data_4.innerHTML = 0;

    row_3.appendChild(row_3_data_1);
    row_3.appendChild(row_3_data_2);
    row_3.appendChild(row_3_data_3);
    row_3.appendChild(row_3_data_4);
    tbody.appendChild(row_3);


    // Creating and adding data to third row of the table
    let row_4 = document.createElement('tr');
    let row_4_data_1 = document.createElement('td');
    row_4_data_1.innerHTML = "2.";
    let row_4_data_2 = document.createElement('td');
    row_4_data_2.innerHTML = "Zheng Hui Jun";
    let row_4_data_3 = document.createElement('td');
    row_4_data_3.innerHTML = "WAD2 is a great module.";

    row_4.appendChild(row_4_data_1);
    row_4.appendChild(row_4_data_2);
    row_4.appendChild(row_4_data_3);
    tbody.appendChild(row_4);

}


function incrementCounter() {
    console.log('This is up')
    var count = document.getElementById('likes_counter').textContent;
    console.log(count);

    count = Number(count);
    count++;
    console.log(count);

    let row_2 = document.createElement('tr');
    let row_2_data_4 = document.createElement('td');
    row_2_data_4.innerHTML = count;
    row_2.appendChild(row_2_data_4);

    
    

}


function decrementCounter() {
    console.log('This is down')
}

