window.addEventListener("keydown", getKeyPress);

//mocht het niet kloppen dan kun je dit weghalen
window.addEventListener("keyup", Stop);

function Stop(){   
    if(document.getElementById('lastmove').innerHTML == "F" || 
    document.getElementById('lastmove').innerHTML == "B" || 
    document.getElementById('lastmove').innerHTML == "L" || 
    document.getElementById('lastmove').innerHTML == "R"){	
        stopmessage = "S";
        document.getElementById('lastmove').innerHTML = 'S'
        console.log(stopmessage);
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

function getKeyPress()
{
    let x = event.which || event.keyCode;
    let cmd = "";
    switch(x)
    {
        case 87:
            cmd = "F";
            document.getElementById('lastmove').innerHTML = "F";
            break;
        case 83:
            cmd = "B";
            document.getElementById('lastmove').innerHTML = "B";
            break;
        case 65:
            cmd = "L";
            document.getElementById('lastmove').innerHTML = "L";
            break;
        case 68:
            cmd = "R";
            document.getElementById('lastmove').innerHTML = "R";
            break;
        case 81:
            cmd = "S";
            document.getElementById('lastmove').innerHTML = "S";
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