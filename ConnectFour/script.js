// Initializing the values for rows and columns of the board
var board_rows = 6;
var board_columns = 7
let Detected = false;
document.addEventListener("DOMContentLoaded", function () {
    FetchData();
    setInterval(FetchData, 500);
});
//Fetching data from database
function FetchData() {
    //icons class name is retrieved from the database
    $.ajax({
        url: 'icons.php',
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            ConnectFourBoard(data);
        }
    });
    //Retrieves the current status of the ongoing game
    $.ajax({
        url: 'ongoing_game_status.php',
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            ConnectFourStatus(data);
        }
    });
    //Retrievs users whose status is online
    $.ajax({
        url: 'online_user_status.php',
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            OnlineUserStatus(data);
        }
    });
    //Retrieve messages from the database
    $.ajax({
        url: 'retrieve_message.php',
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            Messages(data);
        }
    });
    //Retrives user's score from the database
    $.ajax({
        url: 'display_score.php',
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            DisplayScore(data);
        }
    });
    $.ajax({
        url: 'highest_player.php',
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            HighestPlayer(data);
        }
    });

}
// Acknowledment - Reference youtube tutorial on how to create connect four board - original game.
function ConnectFourBoard(data) {
    let ConnectFourBoard = document.getElementById("board");
    ConnectFourBoard.innerHTML = '';
    //For each tile a div element is created and used css to shape it. Placed a button and an i element inside it.
    for (let rows = 0; rows < board_rows; rows++) {
        for (let columns = 0; columns < board_columns; columns++) {
            let Tile = document.createElement("div");
            let TileId = rows.toString() + "-" + columns.toString();
            Tile.classList.add("tile");
            Tile.id = TileId;
            //appending child to parent element
            ConnectFourBoard.appendChild(Tile);
            //button inside div
            let t_btn = document.createElement("button");
            t_btn.id = TileId;
            t_btn.type = "submit";
            t_btn.classList.add("tile-btn");
            //appending child to parent element
            Tile.appendChild(t_btn);
            // i element inside button
            let font_awsome_icon = document.createElement("i");
            font_awsome_icon.id = TileId;
            data.forEach(element => {
                if (element.tile_id == TileId) {
                    font_awsome_icon.className = element.icon_class_name;
                }

            });
            //appending child to parent element
            t_btn.appendChild(font_awsome_icon);
            //function call when any button is clicked
            t_btn.addEventListener("click", function () {
                userClicked(TileId);
            }, { once: true });
        }
    }
}
//function invoked when a button on the connect four board is clicked
function userClicked(TileId) {
    let TileInput = document.createElement("input");
    TileInput.type = "hidden";
    TileInput.value = TileId;
    TileInput.name = "gamebuttonid";
    let ClickedTile = document.getElementById(TileId);
    //appending child to parent element
    ClickedTile.appendChild(TileInput);
}
//function that shows the current status of the connect four board by displaying the retrived data from the database
function ConnectFourStatus(data) {
    for (let rows = 0; rows < board_rows; rows++) {
        for (let columns = 0; columns < board_columns; columns++) {
            /* Each tile id on the connect four board is compared with the clicked tile id's on the database
             and whenever the id's match that tile's icon is replaced by the clicked user's profile picture */
            let TileId = rows.toString() + "-" + columns.toString();
            const ClickedTile = document.getElementById(TileId);
            if (!ClickedTile) {
                continue;
            }
            const ClickedButton = ClickedTile.querySelector('button');
            data.forEach(element => {
                if (element.tile_id == TileId) {
                    ClickedTile.innerHTML = '';
                    if (ClickedButton) {
                        ClickedButton.style.display = "none";
                        ClickedButton.disabled = true;
                    }

                    let UserImg = document.createElement("img");
                    UserImg.src = element.user_picture;
                    UserImg.classList.add("user_picture");
                    ClickedTile.appendChild(UserImg);
                }
            });
        }
    }
    //Connect four detection function call
   
    ConnectFourDetection();

    /* Check if the game is over by checking if the function GameOver() returns a true value. 
    And if it retirn true then an alert message is displayed and the game is set all over again by calling the function NewGame*/
    if (GameOver()) {
        alert("Game Over");
        NewGame();
    }
}
//Function that displays retrived data from database about users who are currently online
function OnlineUserStatus(data) {
    let displaycontainer = document.getElementById("online");
    displaycontainer.innerHTML = "";
    data.forEach(element => {
        let PeopleName = document.createElement("p");
        PeopleName.classList.add("online_name");
        let PeopleProfilePic = document.createElement("img");
        PeopleProfilePic.classList.add("online_img");
        PeopleProfilePic.src = element.profile_picture;
        PeopleName.textContent = element.full_name;
        PeopleName.appendChild(PeopleProfilePic);     
        displaycontainer.appendChild(PeopleName);
    });
}

//Function that displays retrieved data from database about the messages sent by various users on the chat area
function Messages(data) {
    let messagelocation = document.getElementById("mssg-area");
    messagelocation.innerHTML = '';
    let CurrentUser = document.getElementById("sessionuser").value;
    data.forEach(element => {
        let messagecontainer = document.createElement("div");
        messagecontainer.classList.add("msgdiv");
        let chat = document.createElement("p");
        chat.classList.add("msgtxt");
        chat.textContent = element.message;
        let UserImage = document.createElement("img");
        UserImage.classList.add("msgimg");
        UserImage.src = element.profile_picture;
        messagecontainer.appendChild(UserImage);
        messagecontainer.appendChild(chat);
        if (element.user_id == CurrentUser) {
            messagecontainer.classList.add("right");
            chat.style.backgroundColor = "rgb(222, 49, 99,0.5)";
        }
        messagelocation.appendChild(messagecontainer);
    });
    messagelocation.scrollTop = messagelocation.scrollHeight;
}
//intializing and setting two global variables for detecting connect four
let xyz = false;

//Function that detect connect four
//Acknowledgement - Github pages (https://github.com/topics/connect-four-game).
//Acknowledgement - used ChatGpt to correct errors in this section
function ConnectFourDetection() {
    //Each tile on the game board is checked for the presence of an image (profile picture) using conditional statements.
    let GameBoard = [];
    for (let rows = 0; rows < board_rows; rows++) {
        GameBoard[rows] = [];
        for (let columns = 0; columns < board_columns; columns++) {
            let TileID = `${rows}-${columns}`;
            let Tile = document.getElementById(TileID);
            GameBoard[rows][columns] = Tile && Tile.querySelector('img') ? 1 : 0;
        }
    }
/* once images are detected each row is horizontally checked for four consective images in a row. 
    If found then those tiles are highlighted and the function score is called to increment the score by one*/
    for (let rows = 0; rows < board_rows; rows++) {
        for (let columns = 0; columns <= board_columns - 4; columns++) {
            if (GameBoard[rows][columns] === 1 && GameBoard[rows][columns + 1] === 1 && GameBoard[rows][columns + 2] === 1 && GameBoard[rows][columns + 3] === 1) {
                for (let t = 0; t < 4; t++) {
                    document.getElementById(`${rows}-${columns + t}`).style.backgroundColor = "#F3CFC6";
                    document.getElementById(`${rows}-${columns + t}`).style.border = "4px solid #DE3163";
                }
                if (!Detected) {
                    Detected = true;
                    Score();
                }
                

            }
        }
    }
    /* once images are detected each row is vertically checked for four consective images in a row. 
    If found then those tiles are highlighted and the function score is called to increment the score by one*/
    for (let columns = 0; columns < board_columns; columns++) {
        for (let rows = 0; rows <= board_rows - 4; rows++) {
            if (GameBoard[rows][columns] === 1 && GameBoard[rows + 1][columns] === 1 && GameBoard[rows + 2][columns] === 1 && GameBoard[rows + 3][columns] === 1) {
                for (let t = 0; t < 4; t++) {
                    document.getElementById(`${rows + t}-${columns}`).style.backgroundColor = "#F3CFC6";
                    document.getElementById(`${rows + t}-${columns}`).style.border = "4px solid #DE3163";
                }
                if (!Detected) {
                    Detected = true;
                    Score();
                   
                }
                
            }


        }
    }
    /* once images are detected each row is diagonally (left) checked for four consective images in a row. 
    If found then those tiles are highlighted and the function score is called to increment the score by one*/
    for (let rows = 0; rows <= board_rows - 4; rows++) {
        for (let columns = 0; columns <= board_columns - 4; columns++) {
            if (GameBoard[rows][columns] === 1 && GameBoard[rows + 1][columns + 1] === 1 && GameBoard[rows + 2][columns + 2] === 1 && GameBoard[rows + 3][columns + 3] === 1) {
                for (let t = 0; t < 4; t++) {
                    document.getElementById(`${rows + t}-${columns + t}`).style.backgroundColor = "#F3CFC6";
                    document.getElementById(`${rows + t}-${columns + t}`).style.border = "4px solid #DE3163";
                }
                if (!Detected) {
                    Detected = true;
                    Score();
                    
                }
                
            }


        }
    }
     /* once images are detected each row is diagonally (right) checked for four consective images in a row. 
    If found then those tiles are highlighted and the function score is called to increment the score by one*/
    for (let rows = 0; rows <= board_rows - 4; rows++) {
        for (let columns = 3; columns <= board_columns; columns++) {
            if (GameBoard[rows][columns] === 1 && GameBoard[rows + 1][columns - 1] === 1 && GameBoard[rows + 2][columns - 2] === 1 && GameBoard[rows + 3][columns - 3] === 1) {
                for (let t = 0; t < 4; t++) {
                    document.getElementById(`${rows + t}-${columns - t}`).style.backgroundColor = "#F3CFC6";
                    document.getElementById(`${rows + t}-${columns - t}`).style.border = "4px solid #DE3163";
                }
                if (!Detected) {
                    Detected = true;
                    Score();
                    
                }
                
            }


        }
    }
    console.log(Detected);
    //Setting the value to false after each increment
    if (Detected && !xyz) {
        xyz = Detected;
    }


}
//Javascript events used to display the change image button when move enters.
document.addEventListener('DOMContentLoaded', function () {
    const pic_container = document.getElementById("pic_container");
    const imglabel = pic_container.querySelector(".imglabel");
    pic_container.addEventListener('mouseover', function () {
        imglabel.style.opacity = '1';
    });
    pic_container.addEventListener('mouseout', function () {
        imglabel.style.opacity = '0';
    });
});
//Updating the database for each increment in the score
function Score() {
    $.ajax({
        url: 'score.php',
        type: 'POST',
        dataType: 'json',
        success: function () {
            Detected = false;
        }
    });
}
//Displaying the current score to the user
function DisplayScore(data) {
    let displayarea = document.getElementById("score");
    displayarea.textContent = data;
}
//Function that returns true when all the tiles has been clicked. i.e Game Over
function GameOver() {
    for (let rows = 0; rows < board_rows; rows++) {
        for (let columns = 0; columns < board_columns; columns++) {
            let TileID = `${rows}-${columns}`;
            let Tile = document.getElementById(TileID);
            if (!Tile.querySelector('img')) {
                return false;
            }
        }
    }
    return true;
}
//Resets the currentboard status by deleting all user moves and starts a fresh game
function NewGame() {
    $.ajax({
        url: 'reset_board.php',
        type: 'POST',
        dataType: 'json',
    });
}
//Passing the data of the highest player - top 3
function HighestPlayer(data){
    let table = document.getElementById("topplayer");
    table.innerHTML = "";
    data.forEach(element => {
        
        let row = document.createElement("tr");
        let td1 = document.createElement("td");
        let img = document.createElement("img");
        img.src = element.profile_picture;
        img.classList.add("online_img");
        let td2 = document.createElement("td");
        let playername = document.createElement("h6");
        playername.textContent = element.full_name;
        let td3 = document.createElement("td");
        let score = document.createElement("h6");
        score.textContent = element.score;
        table.appendChild(row);
        row.appendChild(td1);
        td1.appendChild(img);
        row.appendChild(td2);       
        td2.appendChild(playername);
        row.appendChild(td3);       
        td3.appendChild(score);
    });
}


