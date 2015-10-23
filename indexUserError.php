<?php
    session_start();
    $connection = mysql_connect("localhost", "bryan55","bryan55201402171747");
    $db = "bryan55";
    mysql_select_db($db, $connection) or die("fail");//'fail' means cannot connect the database
    
    $result1 = mysql_query("SELECT password FROM user WHERE user_name= 3001",$connection) or die("fail1"); //执行SQL查询指令
    $rows = mysql_fetch_row($result1);
    $password1 = $rows[0];
    
    $result2 = mysql_query("SELECT password FROM user WHERE user_name= 3002",$connection) or die("fail1"); //执行SQL查询指令
    $rows = mysql_fetch_row($result2);
    $password2 = $rows[0];
    
    $result3 = mysql_query("SELECT password FROM user WHERE user_name= 3003",$connection) or die("fail1"); //执行SQL查询指令
    $rows = mysql_fetch_row($result3);
    $password3 = $rows[0];
    
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Index Page</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link type="text/css" rel="stylesheet" href="bootstrap/css/bootstrap.css"/>
        <link type="text/css" rel="stylesheet" href="bootstrap/css/bootstrap.min.css"media="screen"/>
        <link type="text/css" rel="stylesheet" href="bootstrap/css/bootstrap-responsive.css"/>
        <link type="text/css" rel="sytlesheet" href="bootstrap/css/bootstrap-responsive.min.css"/>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="bootstrap/js/jquery-1.9.1.js"></script>
        <!--<script type="text/javascript" src="js/headrrom.min.js"></script>-->
        <script type="text/javascript" src="js/validateForm.js"></script>
        <script type="text/javascript" src="js/userData.js"></script>
        <script type="text/javascript" src="js/myJs.js"></script>
        <!--
            In this code the document can not get the element by ID or by Name,
            because the "progress bar"code have not loaded yet, it loads the all code of  document
            from top to bottom.but if you put this code in the <body> and after the "progress bar"code,
            it will work,because at that time the element of progressBar has been loaded into the document.
            on the other hand you can also still retain this code in this area, and then encapsulate this code into
            a function,after the document has been loaded,you can invoke this function in the document,
            such as<input type="text" onclick="XXX()" />,so it also can work well.
            <script>
                document.getElementById("progressBar").style.width = "40%";       
            </script>
        -->
    </head>

    <body onload="statess()" id="mybody" align="center">

        <!-- The bootstrap progress bar  -->
        <div class="progress progress-striped active" id="progressBarParent">
            <div class="bar" style="width: 10%;" id="progressBar"></div>
        </div>

        <!-- The javascript to handle the progressbar  -->
        <script> 
            //implement the progress bar
            function startProgress() {
             
                if(percentage < 100) {
                    percentage = percentage + 30;
                    document.getElementById("progressBar").style.width = percentage+"%";
                    //to increase the progress bar consecutively,and setinterval method will 
                    //implement the startProgress method every 500ms.
                    window.setInterval("startProgress()", 500);
                }else {
                    //If the percentage of progress bar reached 100%,it stop to increase.
                    document.getElementById("progressBar").style.width = percentage+"%";
                    window.clearInterval();
                }
            }
            //the variable of progress bar
            var percentage = 0;
            //starta to carry out the progressbar when loading the page
            startProgress();
            //to listen the page loading information
            document.onreadystatechange = function() {
                //to judge if the page loaded completely
                if(this.readyState === "complete") {    
                    //if the page loaded completely,set the progress bar to 100%
                    percentage = 100;
                    startProgress();
                    //alert("Loading completed! Welcome!");
                    //remove the progressbar
                    document.getElementById("mybody").removeChild(document.getElementById("progressBarParent"));
                    //display the content of page
                    document.getElementById("content").style.display="";
                }
            };
        </script>           

        <div class="container-fluid" style="width: auto;display:none" id="content">
            <!--first low for the header and image-->
            <div class="row-fluid">
                <div class="span13">
                    <!--header-->
                    <div class="navbar navbar-inverse" >
                        <div class="navbar-inner navbar-fixed-top">
                            <a class="brand" href="#">Holiday System</a>
                            <ul class="nav">
                                <li class="active"><a href="#"><i class="icon-home"></i>Home</a></li>
                            </ul>
                            <div id="toBryanWebsiteInNavbar" class="nav pull-right">
                                <li><a href="../"><button type="button" id="toBryanWebsiteBtn" class="btn btn-success">Back to Bryan's Website</button></a>
                            </div>
                            <!--navbar-inner-->
                        </div>
                        <img id="logoPic" src="pics/SheffieldCity.jpg" />
                        <!--navbar navbar-inverse-->   
                    </div>
                </div>
                <!--row-fluid-->   
            </div>
            <!--for login frame--> 
            <div class="row-fluid">
               <div class="well">
			<h4>
				<form id="loginForm" action="session/loginProcess.php" method="post" class="form-horizontal" role="form">
                                <!--<form id="loginForm" action="index.php" method="post">-->
                                    <br /><br />
                                    Username: <input type="text" name="username" id="usernameInLoginForm" placeholder="enter your username here"/>
                                    <br />
                                    <font color='red'><p id="displayUsernameError"></p></font>
                                    <br />
                                    Password: <input type="password" name ="password" id="passwordInLoginForm" placeholder="enter your password here"/>
                                    <br/>
                                    <font color='red'><p id="displayPasswordError"></p></font>
                                    <font color='red'>
                                        <br/>
                                        <p id='displayLoginError'>
                                            User does not exists or the username does not match the password.<br/>
                                            Press me to slide up. ^_^
                                        </p>
                                    </font>
                                    <br/>
                                     <div id="userData">
                                        <p>
                                            <br/>
                                            <h4>For demostration, the user data are open as below:</h4>
                                            <br/>
                                            <table class="table table-striped">
                                                <tr>
                                                    <th>Student</th>
                                                    <th>Username</th>
                                                    <th>Password</th>
            <!--                                        <td>Supervisor:username</td>
                                                    <td>password</td>-->
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>3001</td>
                                                    <td><?php echo $password1;?></td>
            <!--                                        <td>2001</td>
                                                    <td>2001</td>-->
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>3002</td>
                                                    <td><?php echo $password2;?></td>
            <!--                                        <td>2002</td>
                                                    <td>2002</td>-->
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>3003</td>
                                                    <td><?php echo $password3;?></td>
<!--                                                    <td></td>
                                                    <td></td>-->
                                                </tr>
                                            </table>

                                             <button id="hideUserData" type="button" class="btn btn-success">Click me to hide the data. ^_^</button>

                                        </p>
                                    </div>
                                    
                                    <br/>
                                    <input class="span1 btn btn-primary" name="submit" type="submit" id="login" value="Login" />
                                    <input class="btn" type="reset" value="Clear" />
                                    </font>
                                 </form> 
                           
			</h4>
			<br/>
			<br />
                        
                       
                        <br />
                        <br />

		</div>
                
            </div>
            <!--container-fluid-->        
        </div>
        <?php
            include 'include/copyRightBottom.html';
        ?>
    </body>
</html>
