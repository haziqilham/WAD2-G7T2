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
    cell4.innerHTML = "<a id='link_new' href='#' onlick='showComments(id);return false;'> <p id='link_new_word'>" + input2  + "</p></a>"
    cell5.innerHTML = input4
    cell6.innerHTML = 0

}

function showComments(id) {
    console.log("This is right")
    document.getElementById('hide1').style.display = "none";
    document.getElementById('hide2').style.display = "none";
    document.getElementById('hide3').style.display = "none";
    document.getElementById('hide4').style.display = "block";

    console.log(id);
    var thread = document.getElementById(id).innerHTML;
    //console.log(thread)
    
    

    var body = document.getElementById('replies');

    var location = document.getElementById('forum').style.textDecoration = "none";

    var position = document.getElementById('currentPosition')

    position.innerHTML = thread
    


    
    
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
    let heading_0 = document.createElement('th');
    heading_0.innerHTML = "Vote";
    let heading_2 = document.createElement('th');
    heading_2.innerHTML = "Username";
    let heading_3 = document.createElement('th');
    heading_3.innerHTML = "Comment";
    let heading_4 = document.createElement('th');
    heading_4.innerHTML = "Likes";
    

    row_1.appendChild(heading_1);
    row_1.appendChild(heading_0);
    row_1.appendChild(heading_2);   
    row_1.appendChild(heading_3);
    row_1.appendChild(heading_4);
    
    thead.appendChild(row_1);


    let row_2 = document.createElement('tr');
    let row_2_data_0 = document.createElement('td');
    row_2_data_0.innerHTML = "1";
    let row_2_data_1 = document.createElement('td');
    row_2_data_1.style.width ="15px"
    row_2_data_1.innerHTML = "<img src='../forum/up_arrow.png' style='height:30px;' onclick='incrementCounter1();'>" + "<img src='../forum/down_arrow.png' onclick='decrementCounter1();' style='height:50px; padding:0px'>";
    let row_2_data_2 = document.createElement('td');
    row_2_data_2.innerHTML = "Chan Juun Kit";
    let row_2_data_3 = document.createElement('td');
    row_2_data_3.innerHTML = "I love Prof Shah for granting the extension";
    let row_2_data_4 = document.createElement('td');
    row_2_data_4.setAttribute('value', 0);
    row_2_data_4.setAttribute('id', 'likesOne')
    
    row_2_data_4.setAttribute('class', 'span')
    likesCountOne = 0
    row_2_data_4.innerHTML = likesCountOne;
    
    

    row_2.appendChild(row_2_data_0);
    row_2.appendChild(row_2_data_1);
    row_2.appendChild(row_2_data_2);
    row_2.appendChild(row_2_data_3);
    row_2.appendChild(row_2_data_4);
    
    tbody.appendChild(row_2);


    // Creating and adding data to second row of the table
    let row_3 = document.createElement('tr');
    let row_3_data_1 = document.createElement('td');
    row_3_data_1.innerHTML = "2";
    let row_3_data_0 = document.createElement('td');
    row_3_data_0.innerHTML = "<img src='../forum/up_arrow.png' style='height:30px;' onclick='incrementCounter2();'>" + "<img src='../forum/down_arrow.png' onclick='decrementCounter2();' style='height:50px;'>";
    let row_3_data_2 = document.createElement('td');
    row_3_data_2.innerHTML = "Koh Rui Xin";
    let row_3_data_3 = document.createElement('td');
    row_3_data_3.innerHTML = "I love Prof Shah for granting the extension";
    let row_3_data_4 = document.createElement('td');
    row_3_data_4.setAttribute('value', 0);
    row_3_data_4.setAttribute('id', 'likesTwo')
    
    row_3_data_4.setAttribute('class', 'span')
    likesCountTwo = 0
    row_3_data_4.innerHTML = likesCountTwo;
    

    row_3.appendChild(row_3_data_1);
    row_3.appendChild(row_3_data_0);
    row_3.appendChild(row_3_data_2);
    row_3.appendChild(row_3_data_3);
    row_3.appendChild(row_3_data_4);
   
    tbody.appendChild(row_3);


    // Creating and adding data to third row of the table
    let row_4 = document.createElement('tr');
    let row_4_data_1 = document.createElement('td');
    row_4_data_1.innerHTML = "3";
    let row_4_data_0 = document.createElement('td');
    row_4_data_0.innerHTML = "<img src='../forum/up_arrow.png' style='height:30px; padding:0px' onclick='incrementCounter3();'>" + "<img src='../forum/down_arrow.png' onclick='decrementCounter3();' style='height:50px; padding:0px'>";
    let row_4_data_2 = document.createElement('td');
    row_4_data_2.innerHTML = "Zheng Hui Jun";
    let row_4_data_3 = document.createElement('td');
    row_4_data_3.innerHTML = "WAD2 is a great module.";
    let row_4_data_5 = document.createElement('td');
    row_4_data_5.setAttribute('value', 0);
    row_4_data_5.setAttribute('id', 'likesThree')
    
    row_4_data_5.setAttribute('class', 'span')
    likesCountThree = 0
    row_4_data_5.innerHTML = likesCountThree;
    
  

    row_4.appendChild(row_4_data_1);
    row_4.appendChild(row_4_data_0);
    row_4.appendChild(row_4_data_2);
    row_4.appendChild(row_4_data_3);
    row_4.appendChild(row_4_data_5);
    tbody.appendChild(row_4);

}

function incrementCounter1() {
    //console.log(id)

    var disp = document.getElementById('likesOne');
    likesCountOne++;
    disp.innerHTML = likesCountOne;
    

}


function decrementCounter1() {
    //console.log("This is down")
    
    var disp = document.getElementById('likesOne');
    likesCountOne--;
    disp.innerHTML = likesCountOne;
    
}

function incrementCounter2() {
    //console.log(id)

    var disp = document.getElementById('likesTwo');
    likesCountTwo++;
    disp.innerHTML = likesCountTwo;
    

}


function decrementCounter2() {
    //console.log("This is down")
    
    var disp = document.getElementById('likesTwo');
    likesCountTwo--;
    disp.innerHTML = likesCountTwo;
    
}

function incrementCounter3() {
    //console.log(id)

    var disp = document.getElementById('likesThree');
    likesCountThree++;
    disp.innerHTML = likesCountThree;
    

}


function decrementCounter3() {
    //console.log("This is down")
    
    var disp = document.getElementById('likesThree');
    likesCountThree--;
    disp.innerHTML = likesCountThree;
    
}
