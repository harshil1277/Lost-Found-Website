<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <?php
    include('loginvarifier.php');
    ?>
    <?php
    include('config.php');
    $query = "Select *from querymaster where flag=1";
    $result = mysqli_query($con, $query) or die(mysqli_error($con));
    $count = 0;
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $count++;

    }
    ?>
    <title>Notifications</title>

    <!-- CSS Reset -->
    <link rel="stylesheet" type="text/css" href="css/reset.css"
        tppabs="http://www.xooom.pl/work/magicadmin/css/reset.css" media="screen" />

    <!-- Fluid 960 Grid System - CSS framework -->
    <link rel="stylesheet" type="text/css" href="css/grid.css" tppabs="http://www.xooom.pl/work/magicadmin/css/grid.css"
        media="screen" />



    <!-- Main stylesheet -->
    <link rel="stylesheet" type="text/css" href="css/styles.css"
        tppabs="http://www.xooom.pl/work/magicadmin/css/styles.css" media="screen" />



    <!-- Table sorter stylesheet -->
    <link rel="stylesheet" type="text/css" href="css/tablesorter.css"
        tppabs="http://www.xooom.pl/work/magicadmin/css/tablesorter.css" media="screen" />

    <!-- Thickbox stylesheet -->
    <link rel="stylesheet" type="text/css" href="css/thickbox.css"
        tppabs="http://www.xooom.pl/work/magicadmin/css/thickbox.css" media="screen" />

    <!-- Themes. Below are several color themes. Uncomment the line of your choice to switch to different color. All styles commented out means blue theme. -->
    <link rel="stylesheet" type="text/css" href="css/theme-blue.css"
        tppabs="http://www.xooom.pl/work/magicadmin/css/theme-blue.css" media="screen" />

    <!-- JQuery engine script-->
    <script type="text/javascript" src="jquery/jquery-1.3.2.min.js"
        tppabs="http://www.xooom.pl/work/magicadmin/js/jquery-1.3.2.min.js"></script>

    <!-- JQuery WYSIWYG plugin script -->
    <script type="text/javascript" src="jquery/jquery.wysiwyg.js"
        tppabs="http://www.xooom.pl/work/magicadmin/js/jquery.wysiwyg.js"></script>

    <!-- JQuery tablesorter plugin script-->
    <script type="text/javascript" src="jquery/jquery.tablesorter.min.js"
        tppabs="http://www.xooom.pl/work/magicadmin/js/jquery.tablesorter.min.js"></script>

    <!-- JQuery pager plugin script for tablesorter tables -->
    <script type="text/javascript" src="jquery/jquery.tablesorter.pager.js"
        tppabs="http://www.xooom.pl/work/magicadmin/js/jquery.tablesorter.pager.js"></script>

    <!-- JQuery password strength plugin script -->
    <script type="text/javascript" src="jquery/jquery.pstrength-min.1.2.js"
        tppabs="http://www.xooom.pl/work/magicadmin/js/jquery.pstrength-min.1.2.js"></script>

    <!-- JQuery thickbox plugin script -->
    <script type="text/javascript" src="jquery/thickbox.js"
        tppabs="http://www.xooom.pl/work/magicadmin/js/thickbox.js"></script>


    <!-- Initiate tablesorter script -->
    <script type="text/javascript">
        $(document).ready(function () {
            $("#myTable")
                .tablesorter({
                    // zebra coloring
                    widgets: ['zebra'],
                    // pass the headers argument and assing a object 
                    headers: {
                        // assign the sixth column (we start counting zero) 
                        6: {
                            // disable it by setting the property sorter to false 
                            sorter: false
                        }
                    }
                })
                .tablesorterPager({ container: $("#pager") });
        }); 
    </script>


</head>

<body>
    <!-- Header -->
    <div id="header">
        <!-- Header. Status part -->
        <div id="header-status">
            <div class="container_12">
                <div class="grid_8">
                    &nbsp;
                </div>
                <div class="grid_4">
                    <a href="logout.php" id="logout">
                        <strong>Logout</strong>
                        <?php echo ' (' . $login_session . ')'; ?>
                    </a>
                </div>
            </div>
            <div style="clear:both;"></div>
        </div> <!-- End #header-status -->

        <!-- Header. Main part -->
        <div id="header-main">
            <div class="container_12">
                <div class="grid_12">
                    <div id="logo">
                        <ul id="nav">

                            <li title="View Your Dashboad"><a href="admin.php">Dashboard</a></li>
                            <li><a href="lost.php" title="Lost Something?">Lost</a></li>
                            <li><a href="found.php" title="Found Something?">Found</a></li>
                            <li><a href="messages.php" title="You Might Have Some Messages">Messages(
                                    <?php echo $count; ?>)
                                </a></li>
                            <li id="current"><a href="notifications.php"
                                    title="Notifications Might Be Pending">Notification(10)</a></li>
                            <li><a href="myprofile.php" title="View Or Change Your Profile Settings">My Profile</a></li>
                            <li><a href="Setting.php" title="Add or Remove Some Settings">Settings</a></li>
                            <li><a href="csc.php" title="View Remove or Edit Cities, States and Countries">City State
                                    Country</a></li>
                        </ul>
                    </div><!-- End. #Logo -->
                </div><!-- End. .grid_12-->
                <div style="clear: both;"></div>
            </div><!-- End. .container_12 -->
        </div> <!-- End #header-main -->
        <div style="clear: both;"></div>
        <!-- Sub navigation -->

    </div> <!-- End #header -->

    <div class="container_12">



        <!-- Dashboard icons -->
        <div class="grid_7">

            <a href="found.php" class="dashboard-module">
                <img src="images/Crystal_Clear_write.gif"
                    tppabs="http://www.xooom.pl/work/magicadmin/images/Crystal_Clear_write.gif" width="64" height="64"
                    alt="edit" />
                <span>Found Something?</span>
            </a>
            <a href="lost.php" class="dashboard-module">
                <img src="images/Crystal_Clear_write.gif"
                    tppabs="http://www.xooom.pl/work/magicadmin/images/Crystal_Clear_write.gif" width="64" height="64"
                    alt="edit" />
                <span>Lost Something?</span>
            </a>
            <a href="" class="dashboard-module">
                <img src="images/Crystal_Clear_calendar.gif"
                    tppabs="http://www.xooom.pl/work/magicadmin/images/Crystal_Clear_calendar.gif" width="64"
                    height="64" alt="edit" />
                <span>Calendar</span>
            </a>

            <a href="myprofile.php" class="dashboard-module">
                <img src="images/Crystal_Clear_user.gif"
                    tppabs="http://www.xooom.pl/work/magicadmin/images/Crystal_Clear_user.gif" width="64" height="64"
                    alt="edit" />
                <span>My profile</span>
            </a>

            <a href="admin.php" class="dashboard-module">
                <img src="images/Crystal_Clear_stats.gif"
                    tppabs="http://www.xooom.pl/work/magicadmin/images/Crystal_Clear_stats.gif" width="64" height="64"
                    alt="edit" />
                <span>Dashboad</span>
            </a>

            <a href="Setting.php" class="dashboard-module">
                <img src="images/Crystal_Clear_settings.gif"
                    tppabs="http://www.xooom.pl/work/magicadmin/images/Crystal_Clear_settings.gif" width="64"
                    height="64" alt="edit" />
                <span>Settings</span>
            </a>
            <div style="clear: both"></div>
        </div> <!-- End .grid_7 -->

        <!-- Account overview -->
        <div class="grid_5">
            <div class="module">

                <h2><span>Account overview</span></h2>

                <div class="module-body">
                    <?php
                    include('config.php');
                    $query = "select *from adminmaster where EMailID ='{$login_session}'";
                    $result = mysqli_query($con, $query) or die(mysqli_error($con));
                    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                        ?>

                        <p>
                            <strong>User's Email: </strong>
                            <?php echo $login_session; ?><br />
                            <strong>Username </strong>
                            <?php echo $row['UserName']; ?><br />

                        </p>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <div style="clear:both;"></div>
        </div> <!-- End .grid_5 -->

        <div style="clear:both;"></div>



        <div class="grid_12">

            Notification boxes
            <span class="notification n-success">New Registrations</span>

            <span class="notification n-information">Total Number of Visiters</span>

            <span class="notification n-attention">Reportes</span>

            <div class="bottom-spacing">

                <!-- Button -->

            </div>

            <!-- Footer -->
            <div id="footer">
                <div class="container_12">
                    <div class="grid_12">

                        <p>&copy; 2023. <a href="https://www.iitj.ac.in" title="Visit to official Profile">IIT Jodhpur</a></p>
                    </div>
                </div>
                <div style="clear:both;"></div>
            </div> <!-- End #footer -->
</body>

</html>