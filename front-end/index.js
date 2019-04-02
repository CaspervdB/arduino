window.addEventListener("keydown", getKeyPress);

//mocht het niet kloppen dan kun je dit weghalen
window.addEventListener("keyup", Stop);

function Stop(){   
    stopmessage = "S";
    if(cmd == "F" || cmd == "B" || cmd == "L" || cmd == "R"){	
        $.ajax( {
                url: "sendCommand.php",
                method: "POST",
                data: {
                        command:stopmessage
                },
                dataType: "text",
                success: function(strMessage) {
                        $("#stopped").text(strMessage);
                }
        });
    }
}
//mocht het niet kloppen dan kun je dit weghalen

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
        case 81:
            cmd = "S";
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