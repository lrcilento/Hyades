<html>
    <style>
        body {
            background-color:dimgray;
        }
        table {
            background-color:lightgrey; 
            width:15%; 
            text-align:center; 
            border: 2px solid black;
            table-layout: fixed;
        }
        td, th {
            padding: 2.5%;
        }
    </style>
    <body>
        <br>
	<div align="middle">
	    <table><tr><th style="padding-bottom: 0%; padding-top: 5%">
            	<h2>Hyades Control Panel</h2>
	    </th></td></table>
	</div>
	<br>
        <?php
	    function checkService() {
	        if (strpos(shell_exec('systemctl status hyades.service'), 'inactive') == true){
		    return "Inactive";
	        }
	        else {
		    return "Active";
	        }
	    }
	    $consoleRaw = shell_exec('systemctl status hyades.service');
	    if(isset($_POST['startButton'])) {
		if(checkService() == "Active") {
		    $consoleOutput = ('Service already running: <br> <br>'.$consoleRaw);
		}
		else {
		    shell_exec('sudo systemctl start hyades.service');
		    $consoleRaw = shell_exec('systemctl status hyades.service');
		    $consoleOutput = ('Service successfully started: <br> <br>'.$consoleRaw);
		}
	    }
	    if(isset($_POST['stopButton'])) {
		if(checkService() == "Active") {
		    shell_exec('sudo systemctl stop hyades.service');
		    $consoleRaw = shell_exec('systemctl status hyades.service');
		    $consoleOutput = ('Service successfully stopped: <br> <br>'.$consoleRaw);
		}
		else {
		    $consoleOutput = ('Service inactive: <br> <br>'.$consoleRaw);
		}
	    }
	    $serviceStatus = checkService();
	    if(isset($_POST['closeWindow'])) {
		$consoleOutput = shell_exec('sudo python3 closeWindow.py');
		shell_exec('sudo systemctl restart hyades.service');
	    }
	    if(isset($_POST['openWindow'])) {
		$consoleOutput = shell_exec('sudo python3 openWindow.py');
		shell_exec('sudo systemctl restart hyades.service');
	    }
	    $windowStatus = shell_exec('sudo python3 displayWindowStatus.py');
        ?>
        <div align='middle'>
            <table>
                <tr>
                    <th colspan="2">Status</th>
                </tr>
                <tr>
                    <th>Service</th>
                    <th>Window</th>
                </tr>
                <tr>
                    <td>
                        <?php
                            print $serviceStatus;
                        ?>
                    </td>
                    <td>
                        <?php
                            print $windowStatus;
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>
			<form method="post">
                        <input type="submit" name="startButton" value="Start"></button>
                        <input type="submit" name="stopButton" value="Stop"></button>
			</form>
                    </td>
                    <td>
			<form method="post">
                        <input type="submit" name="closeWindow" value="Close"></button>
			<input type="submit" name="openWindow" value="Open"></button>
			</form>
                    </td>
                </tr>
            </table>
        </div>
        <br>
        <div align='middle'>
            <table>
                <tr>
                    <th colspan="2">Console</th>
                </tr>
                    <td colspan="2">
		    <?php
			print $consoleOutput;
		    ?>
		    </td>
                </tr>
            </table>
        </div>
    </body>
    <script>
    </script>
</html>

