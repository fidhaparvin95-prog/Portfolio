var board_rows = 6;
var board_columns = 7

document.addEventListener("DOMContentLoaded",function(){
    FetchData();
    
    setInterval(FetchData,500);
});
function FetchData(){
    $.ajax({
        url: 'icons.php',
        type: 'GET',
        dataType: 'json',
        success:function(data){
            ConnectFourBoard(data);
        }
    });
    $.ajax({
        url: 'ongoing_game_status.php',
        type: 'GET',
        dataType: 'json',
        success:function(data){
            ConnectFourStatus(data);
        }
    });
    $.ajax({
        url: 'online_user_status.php',
        type: 'GET',
        dataType: 'json',
        success:function(data){
            OnlineUserStatus(data);
        }
    });
    $.ajax({
        url: 'retrieve_message.php',
        type: 'GET',
        dataType: 'json',
        success:function(data){
            Messages(data);
        }
    });
    
}

function ConnectFourBoard(data){
    // console.log(data);
    let ConnectFourBoard = document.getElementById("board");
    ConnectFourBoard.innerHTML = '';
    for(let rows = 0; rows < board_rows; rows++){
        for(let columns = 0; columns < board_columns; columns++){
            let Tile = document.createElement("div");
            let TileId = rows.toString() + "-" + columns.toString();
            Tile.classList.add("tile");
            Tile.id = TileId;
            ConnectFourBoard.appendChild(Tile);

            let t_btn = document.createElement("button");
            t_btn.id = TileId;
            t_btn.type = "submit";
            t_btn.classList.add("tile-btn");
            Tile.appendChild(t_btn);

            let font_awsome_icon = document.createElement("i");
            font_awsome_icon.id = TileId;
            data.forEach(element => {
                if(element.tile_id == TileId){
                    font_awsome_icon.className = element.icon_class_name;
                }
                
            });
            t_btn.appendChild(font_awsome_icon);
            t_btn.addEventListener("click",function(){
                userClicked(TileId);
            },{once : true});
        }
    }
}
function userClicked(TileId){
    let TileInput = document.createElement("input");
    TileInput.type = "hidden";
    TileInput.value = TileId;
    TileInput.name = "gamebuttonid";
    let ClickedTile = document.getElementById(TileId);
    ClickedTile.appendChild(TileInput);
}
function ConnectFourStatus(data){
    for(let rows = 0; rows < board_rows; rows++){
        for(let columns = 0; columns < board_columns; columns++){
            let TileId = rows.toString() + "-" + columns.toString();
            let ClickedTile = document.getElementById(TileId);
            let ClickedButton = ClickedTile.querySelector('button');
            data.forEach(element => {               
                if(element.tile_id == TileId){                   
                    ClickedTile.innerHTML = '';
                    ClickedButton.style.display = "none";
                    let UserImg = document.createElement("img");
                    UserImg.src = element.user_picture;
                    UserImg.classList.add("user_picture");
                    ClickedTile.appendChild(UserImg);
                }
            });
        }
    }
    ConnectFourDetection();
}
function OnlineUserStatus(data)
{
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
        // PeopleName.appendChild(document.createTextNode(" " +element.full_name));       
        displaycontainer.appendChild(PeopleName);
    });
}


function Messages(data){
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
        if(element.user_id == CurrentUser){
            messagecontainer.classList.add("right");
            chat.style.backgroundColor = "#F3CFC6" ;
        }
        messagelocation.appendChild(messagecontainer);
    });
    messagelocation.scrollTop = messagelocation.scrollHeight;
}

function ConnectFourDetection()
{
    let GameBoard = [];
    for(let rows = 0;rows < board_rows; rows++){
        GameBoard[rows] = [];
        for(let columns = 0;columns < board_columns; columns++){
            let TileID = `${rows}-${columns}`;
            let Tile = document.getElementById(TileID);
            GameBoard[rows][columns] = Tile.querySelector('img') ? 1 : 0;
        }
    }
    let Detected = false;
    for(let rows = 0;rows < board_rows; rows++){
        for(let columns = 0;columns <= board_columns - 4; columns++){
            if(GameBoard[rows][columns] === 1 && GameBoard[rows][columns + 1] === 1 && GameBoard[rows][columns + 2] === 1 && GameBoard[rows][columns + 3] === 1){
                for(let t = 0; t < 4; t++){
                    document.getElementById(`${rows}-${columns + t}`).style.backgroundColor = "#F3CFC6";
                    document.getElementById(`${rows}-${columns + t}`).style.border = "4px solid #DE3163";
                }
                Score();
            }
        }
    }
    for(let columns = 0; columns < board_columns; columns++){
        for(let rows = 0; rows <= board_rows - 4; rows++){
            if(GameBoard[rows][columns] === 1 && GameBoard[rows + 1][columns] === 1 && GameBoard[rows + 2][columns] === 1 && GameBoard[rows + 3][columns] === 1){
                for(let t = 0; t < 4; t++){
                    document.getElementById(`${rows + t}-${columns}`).style.backgroundColor = "#F3CFC6";
                    document.getElementById(`${rows + t}-${columns}`).style.border = "4px solid #DE3163";
                }
                Score();
            }
        }
    }
    for(let rows = 0;rows <= board_rows - 4; rows++){
        for(let columns = 0; columns <= board_columns - 4; columns++){
            if(GameBoard[rows][columns] === 1 && GameBoard[rows + 1][columns + 1] === 1 && GameBoard[rows + 2][columns + 2] === 1 && GameBoard[rows + 3][columns + 3] === 1){
                for(let t = 0; t < 4; t++){
                    document.getElementById(`${rows + t}-${columns + t}`).style.backgroundColor = "#F3CFC6";
                    document.getElementById(`${rows + t}-${columns + t}`).style.border = "4px solid #DE3163";
                }
                Score();
            }
        }
    }
    for(let rows = 0;rows <= board_rows - 4; rows++){
        for(let columns = 3; columns <= board_columns; columns++){
            if(GameBoard[rows][columns] === 1 && GameBoard[rows + 1][columns - 1] === 1 && GameBoard[rows + 2][columns - 2] === 1 && GameBoard[rows + 3][columns - 3] === 1){
                for(let t = 0; t < 4; t++){
                    document.getElementById(`${rows + t}-${columns - t}`).style.backgroundColor = "#F3CFC6";
                    document.getElementById(`${rows + t}-${columns - t}`).style.border = "4px solid #DE3163";
                }
                Score();
            }
        }
    }
    // if(Detected){
    //     Score();
    // }
}
document.addEventListener('DOMContentLoaded',function(){
    const pic_container = document.getElementById("pic_container");
    const imglabel = pic_container.querySelector(".imglabel");
    pic_container.addEventListener('mouseover',function(){
        imglabel.style.opacity = '1';
    });
    pic_container.addEventListener('mouseout',function(){
        imglabel.style.opacity = '0';
    });
});

function Score(){
    $.ajax({
        url: 'score.php',
        type: 'POST',
        dataType: 'json',   
    });
}