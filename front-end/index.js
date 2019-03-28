window.addEventListener("keydown", getKeyPress);

function getKeyPress()
{
    let x = event.which || event.keyCode;
    let cmd = "";
    switch(x)
    {
        case 87:
            cmd = "F";
            break;
        case 83:
            cmd = "B";
            break;
        case 65:
            cmd = "L";
            break;
        case 68:
            cmd = "R";
            break;
    }
    console.log(cmd);
	if(cmd != "")
	{	
		$.ajax( {
			url: "sendCommand.php",
			method: "POST",
			data: {
				command:cmd
			},
			dataType: "text",
			success: function(strMessage) {
				$("#stopped").text(strMessage);
			}
		});
	}
}