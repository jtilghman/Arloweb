<?php
if (!file_exists('arloweb.ini')) {
$ini_array = parse_ini_file("arloweb.ini");
#print_r($ini_array);
#echo("{$ini_array['scriptFolder']}<br/>");
#echo("{$ini_array['rosUser']}<br/>");*/
echo 'ERROR: arloweb.ini not found . . . ';
echo '<script>window.location.href = "./missingConfig.html";</script>';
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <link rel="shortcut icon" href="icons/favicon.ico">
        <link rel="apple-touch-icon" sizes="57x57" href="icons/apple-touch-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="icons/apple-touch-icon-60x60.png">
        <link rel="icon" type="image/png" href="icons/favicon-16x16.png" sizes="16x16">
        <link rel="icon" type="image/png" href="icons/favicon-32x32.png" sizes="32x32">
        <meta name="msapplication-TileColor" content="#00aba9">
        <meta name="msapplication-config" content="/arloweb/icons/browserconfig.xml">
        <title>ArloWeb</title>
        <link rel="stylesheet" type="text/css" href="lcars.css" />
        <script type="text/javascript" src="jquery-2.1.1.min.js"></script>
        <link href="jquery-ui-1.10.4.custom.min.css" rel="stylesheet">
        <script src="jquery-ui-1.10.4.custom.min.js"></script>
        <!-- http://wiki.ros.org/roslibjs/Tutorials/BasicRosFunctionality -->
        <!-- <script type="text/javascript" src="http://cdn.robotwebtools.org/EventEmitter2/current/eventemitter2.min.js"></script>
        <script type="text/javascript" src="http://cdn.robotwebtools.org/roslibjs/current/roslib.min.js"></script>
        Using local copies to facilitate offline robot operation. -->
        <script type="text/javascript" src="eventemitter2.min.js"></script>
        <script type="text/javascript" src="roslib.min.js"></script>
        <script type="text/javascript" src="lcars.js"></script>
        <script type="text/javascript">
        var serverIP = '<?php echo $_SERVER['SERVER_ADDR']; ?>';
        </script>
        <script type="text/javascript" src="arloweb.js"></script>
    </head>
    <body>
        <ul id="upper-side-panel" class="upper-side-panel">
            <li style="height: 141px; background-color: rgb(204, 221, 255);">
                <div style="line-height: 260px; font-size: 20px;">
                    <span id="onlinestatus" style="padding-right:2px"></span>
                </div>
            </li>
            <li id="connectButton-li" style="height: 47px; background-color:#FF9900; margin-bottom: 0;">
                <span style="padding-right:2px"><a class="connectButton"><span id="connectText" >NO STATUS</span></a></span>
            </li>
        </ul>
        <div id="upper-content">
            <div id="up-header">
                <h1>ARLO BOT</h1>
            </div>
            <div id="up-text">
                <p>
                    Use F11 for full screen.
                </p>
            </div>
            <div id="data-table" style="margin-left: 150px;">
                <table style="width: 100%; border-spacing: 0;">
                    <!-- Set border="1" to debug table -->
                    <!-- The table should fill the space but ultimately align right with space on the left corresponding to the elbow -->
                    <tr>
                        <td style="width:15%; color: #FF9900">PROPELLER BOARD</td>
                        <td style="width:5%"></td>
                        <td style="width:5%"></td>
                        <td style="width:10%; color: #FF9900">SETTINGS</td>
                        <td style="width:12%"><span id='settings' style="color: #CCDDFF"></span></td>
                        <td style="width:3%"></td>
                        <td style="width:14%">Left Motor:</td>
                        <td style="width:10%"><span id='leftMotor'>N/A</span></td>
                        <td style="width:1%"></td>
                        <td style="width:15%; color: #FF9900">Source:</td>
                        <td style="width:10%; color: #FF9900; white-space: nowrap;"><span id='serverTime' style="color: #FF9900"><a href="https://github.com/chrisl8">https://github.com/chrisl8</a></span></td>
                    </tr>
                    <tr>
                        <td>Forward:</td>
                        <td><span id='distanceCenter'></span></td>
                        <td></td>
                        <td>Heading:</td>
                        <td><span id='Heading'></span></td>
                        <td></td>
                        <td>Right Motor:</td>
                        <td><span id='rightMotor'>N/A</span></td>
                        <td></td>
                        <td style="color: #FF9900">LCARS:</td>
                        <td><span id='yourTime' style="color: #FF9900"><a href="http://www.siriustrader.com/LCARS/jquery.lcars-master/">Template by Josh Messer</a></span></td>
                    </tr>
                    <tr>
                        <td>Left:</td>
                        <td><span id='distanceLeft'></span></td>
                        <td></td>
                        <td>Speed:</td>
                        <td><span id='travelSpeed'></span></td>
                        <td></td>
                        <td>tilt</td>
                        <td><span id='tilt'></span></td>
                        <td></td>
                        <td>IP:</td>
                        <td><span id='ipEntry'><?php echo $_SERVER['SERVER_ADDR']; ?></span></td>
                    </tr>
                    <tr>
                        <td>Right:</td>
                        <td><span id='distanceRight'></span></td>
                        <td></td>
                        <td>Rotation:</td>
                        <td><span id='rotateSpeed'></span></td>
                        <td></td>
                        <td>View:</td>
                        <td><span id='viewAngle'></span></td>
                        <td></td>
                        <td>AC Power:</td>
                        <td><span id='acPower'>N/A</span></td>
                    </tr>
                    <tr>
                        <td>connectRequested:</td>
                        <td><span id='connectRequested'></span></td>
                        <td></td>
                        <td>connectedToNXT:</td>
                        <td><span id='connectedToNXT'></span></td>
                        <td></td>
                        <td>Data Sent</td>
                        <td><span id='dataSent'>N/A</span></td>
                        <td></td>
                        <td style="color: #FF9900">Action:</td>
                        <td><span id='action' style="color: #CCDDFF"></span></td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="line-middle" >
            <div class="top" style="background-color:#3366FF;">
                &nbsp;
            </div><div class="bottom" style="background-color:#CCDDFF;"></div>
        </div>
        <ul id="lower-side-panel" class="lower-side-panel">
            <li id="pingButton-li" style="height: 94px; background-color: rgb(204, 221, 255);">
                <div style="line-height: 166px;">
                    <span style="padding-right:2px"><a class="pingButton">PING</a></span>
                </div>
            </li>
            <li id="wakeScreenButton-li" style="height: 30px; background-color: rgb(51, 102, 255);">
                <span style="padding-right:2px"><a class="wakeScreenButton"><span id="wakeScreen">WAKE SCREEN</span></a></span>
            </li>
            <li id="empty1Button-li" style="height: 30px; background-color: rgb(204, 221, 255);">
                <span style="padding-right:2px"><a class="empty1Button"><span id="empty1">MICROPHONE</span></a></span>
            </li>
            <li id="empty2Button-li" style="height: 30px; background-color: rgb(51, 102, 255);">
                <span style="padding-right:2px"><a class="empty2Button"><span id="empty2">EMPTY 2</span></a></span>
            </li>
            <li id="empty3Button-li" style="height: 30px; background-color: rgb(204, 221, 255);">
                <span style="padding-right:2px"><a class="empty3Camera"><span id="empty3">EMPTY 3</span></a></span>
            </li>
            <li id="staycloseButton-li" style="height: 30px; background-color: rgb(51, 102, 255);">
                <span style="padding-right:2px"><a class="staycloseButton">STAY CLOSE</a></span>
            </li>
            <li id="resetButton-li" style="height: 240px; border-bottom-style: none; background-color: rgb(204, 221, 255);">
                <span style="padding-right:2px"><a class="resetButton">RESET</a></span>
            </li>
        </ul>
        <div id="lower-content" class="lower-content" style="margin-left:87px;">
            <div id="left-lower-content-box" style="float:left;">
                <!-- <div id="statusLight"></div> -->
                <table>
                    <tr>
                        <td></td>
                        <td><a class='forwardButton'>Forward</a></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><a class='leftButton'>Left</a></td>
                        <td><a class='stopButton'>Stop</a></td>
                        <td><a class='rightButton'>Right</a></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><a class='reverseButton'>Reverse</a></td>
                        <td></td>
                    </tr>
                </table>
                <div id="middle-lower-content-box" style="float:left; margin:20px;">
                    Travel Speed:
                    <div id="travelSpeedSlider"></div>
                    Rotate Speed:
                    <div id="rotateSpeedSlider"></div>
                    <textarea name="speak" id="speak" rows="2" cols="40" placeholder="Enter text to speak here . . ." ></textarea><br/>
                    <a id="speakButton">SPEAK</a>
        <div id="microphone" style="display: block;">
<embed type="application/x-vlc-plugin" name="robotMicrophone" autoplay="yes" loop="no" height="40" width="320" target="rtp://234.5.5.5:1234">
        </div>
                </div>
            </div>
            <div id="mainViewscreenBox" style="/* float: left; */text-align:center; border:1px solid; border-color:#5599FF; /* margin: 10px; */margin-left: 434px;">
                <table style="width: 100%">
                    <tr>
                        <td><a class="camera1Button">CAMERA 1</a></td>
                        <td><a class="camera2Button">CAMERA 2</a></td>
                        <td style="
                        padding-right: 100px;
                        "><span id="statusLight"></span><span id="statusLight2"></span></td><td><a class="upperLightButton">UPPER LIGHT</a></td>
                        <td><a class="lowerLightButton">LOWER LIGHT</a></td>
                    </tr>
                </table>
                <!-- Logitech c615 resolution is 1280 x 720 (or HD if you want but I don't want to eat the bandwidth)
                http://www.logitech.com/en-us/product/hd-webcam-c615 -->
                <img id="videoFeed" alt="Video feed" src="http://<?php echo $_SERVER['SERVER_ADDR']; ?>/arloweb/xscreen.png" style="width: 100%;">
            </div>
        </div>
    </body>
</html>