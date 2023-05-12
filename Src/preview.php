<!DOCTYPE HTML>

<head>
    <?php
    include('loginvarifier.php');
    ?>
    <title>Recent Lost And Founds</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="css/style4.css" rel="stylesheet" type="text/css" media="all" />
    <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="js/move-top.js"></script>
    <script type="text/javascript" src="js/easing.js"></script>
    <script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
    <link href="css/easy-responsive-tabs.css" rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" href="css/global.css">
    <script src="js/slides.min.jquery.js"></script>
    <script>
        $(function () {
            $('#products').slides({
                preload: true,
                preloadImage: 'img/loading.gif',
                effect: 'slide, fade',
                crossfade: true,
                slideSpeed: 350,
                fadeSpeed: 500,
                generateNextPrev: true,
                generatePagination: false
            });
        });
    </script>
</head>

<body>

<?php
function wordSimilarity($s1,$s2) {

    $words1 = preg_split('/\s+/',$s1);
    $words2 = preg_split('/\s+/',$s2);
    $diffs1 = array_diff($words2,$words1);
    $diffs2 = array_diff($words1,$words2);

    $diffsLength = strlen(join("",$diffs1).join("",$diffs2));
    $wordsLength = strlen(join("",$words1).join("",$words2));
    if(!$wordsLength) return 0;

    $differenceRate = ( $diffsLength / $wordsLength );
    $similarityRate = 1 - $differenceRate;
    return $similarityRate;

}
?>
<div class="wrap">
        <div class="header">
            
            <div class="header_top">
                
                <div class="cart">
                    <p>
                    
                    </p>
                </div>
                <script type="text/javascript">
                function DropDown(el) {
                    this.dd = el;
                    this.initEvents();
                }
                DropDown.prototype = {
                    initEvents: function() {
                        var obj = this;

                        obj.dd.on('click', function(event) {
                            $(this).toggleClass('active');
                            event.stopPropagation();
                        });
                    }
                }

                $(function() {

                    var dd = new DropDown($('#dd'));

                    $(document).click(function() {
                        // all dropdowns
                        $('.wrapper-dropdown-2').removeClass('active');
                    });

                });
                </script>
                
            </div>
            <div class="header_bottom">
                <div class="menu">
                    <ul>
                        <li><a href="home.php">Home</a></li>
                        <li><a href="index.php">Back To Items</a></li>
                        <div class="clear"></div>
                    </ul>
                </div>
                <div class="search_box">

                </div>
                <div class="clear"></div>
            </div>
        </div>
        
            <div class="section group">
                <?php
                include('config.php');
                if (isset($_GET["id"])) {
                    $id = (int) $_GET["id"];

                    $query = "Select *from foundmaster where FoundID='{$id}'";
                    $result = mysqli_query($con, $query) or die(mysqli_error($con));
                    $imgdir = "uploads/";


                    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                        $tempname = $row['Image'];
                        $imagename = $imgdir . "" . $tempname;


                        ?>
                        <div class="cont-desc span_1_of_2">
                            <div class="product-details">
                                <div class="grid images_3_of_2">
                                    <div id="container">
                                        <div id="products_example">
                                            <div id="products">
                                                <div class="slides_container">
                                                    <a href="" target="_blank"><img src="<?php echo $imagename; ?>" alt=" "
                                                            width="350" height="350" /></a>

                                                </div>
                                                <ul class="pagination">

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="desc span_3_of_2">
                                    <h2 style="color:black">
                                        <?php echo $row['ProductName'];
                                        $search_text =  $row['ProductName'];
                                        $sql =  "Select *from lostmaster";
                                        // $sql = "SELECT * FROM lostmaster WHERE ProductName LIKE '%$search_text%'";
                                        $result1=mysqli_query($con,$sql);
                                        $row1=mysqli_fetch_array($result1);
                                        $from = $row1['LostFrom'];
                                        $inform = "Inform about Item";
                                        ?>
                                    </h2>
                                    <p>Category:
                                        <?php echo $row['Category']; ?>
                                    </p>
                                    <p>Found From:
                                        <?php echo $row['FoundFrom']; ?>
                                    </p>
                                    <p>Contact:
                                        <?php echo $row['ContactNumber']; ?>
                                    </p>
                                    <p>Email Address:<span>
                                            <?php echo $row['EmailAdd']; ?>
                                        </span></p>
                                    <div class="price">
                                        <p>Found By: <span style="color:black">
                                                <?php echo $row['PersonName']; ?>
                                            </span></p>
                                    </div>

                                    <div class="available">
                                        <p></p>
                                        <ul>

                                        </ul>
                                    </div>
                                    <div class="share-desc">
                                        <div class="share">

                                            <ul>

                                            </ul>
                                        </div>
                                        <div class="button"><span><a href="">Ask For Item</a></span></div>
                                        <div class="clear"></div>
                                    </div>

                                </div>

                            </div>




                        </div>


                    </div>
                </div>
            </div>

            <?php
                    }
                }
                ?>



            
            
            
    </div>



    <div class="main">
            
            <div class="section group">
                <?php
                include('config.php');
                if (isset($_GET["id"])) {
                    $id = (int) $_GET["id"];

                    $query = "Select *from lostmaster where LostID='{$id}'";
                    $result = mysqli_query($con, $query) or die(mysqli_error($con));
                    $imgdir = "uploads/";


                    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                        $tempname = $row['Image'];
                        $imagename = $imgdir . "" . $tempname;


                        ?>
                        <div class="cont-desc span_1_of_2">
                            <div class="product-details">
                                <div class="grid images_3_of_2">
                                    <div id="container">
                                        <div id="products_example">
                                            <div id="products">
                                                <div class="slides_container">
                                                    <a href="" target="_blank"><img src="<?php echo $imagename; ?>" alt=" "
                                                            width="350" height="350" /></a>

                                                </div>
                                                <ul class="pagination">

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="desc span_3_of_2">
                                    <h2 style="color:black">
                                        <?php echo $row['ProductName'];
                                        $search_text =  $row['ProductName'];
                                        $sql =  "Select *from foundmaster";
                                        // $sql = "SELECT * FROM foundmaster WHERE ProductName LIKE '%$search_text%'";
                                        $result1=mysqli_query($con,$sql);
                                        $row1=mysqli_fetch_array($result1);
                                        $from = $row1['FoundFrom'];
                                        
                                        ?>
                                    </h2>
                                    <p>Category:
                                        <?php echo $row['Category']; ?>
                                    </p>
                                    <p>Lost From:


                                        <?php  
                                                echo $row['LostFrom'];
                                                ?>

                                    </p>
                                    <p>Contact:
                                        <?php echo $row['ContactNumber']; ?>
                                    </p>
                                    <p>Email Address:<span>
                                            <?php echo $row['EmailAdd']; ?>
                                        </span></p>
                                    <div class="price">
                                        <p>Person Name: <span style="color:black">
                                                <?php echo $row['PersonName']; ?>
                                            </span></p>
                                    </div>

                                    <div class="available">
                                        <p></p>
                                        <ul>

                                        </ul>
                                    </div>
                                    <div class="share-desc">
                                        <div class="share">

                                            <ul>

                                            </ul>
                                        </div>
                                        <div class="button"><span><a href="">Inform about Item</a></span></div>

                                        <div class="clear"></div>
                                    </div>

                                </div>

                            </div>




                        </div>


                    </div>
                </div>
            </div>

            <?php
                    }
                }
                ?>
            
            
            <div style="background-color: black; color:white; padding: 20px 20px;"> Best Matches found
            </div>
            <?php
            
            $result = mysqli_query($con, $sql);
            if (mysqli_num_rows($result) > 0) { 
                while($row = mysqli_fetch_assoc($result)) { 
                    
                    $column_text = $row["ProductName"] ;
                    $tempname = $row['Image'];
                    $imagename = $imgdir . "" . $tempname;
                    similar_text($column_text, $search_text, $percent);

                if ($percent > 50) {

                
                ?>
                <div class="cont-desc span_1_of_2">
                    
                            <div class="product-details">
                                <div class="grid images_3_of_2">
                                    <div id="container">
                                        <div id="products_example">
                                            <div id="products">
                                                <div class="slides_container">
                                                <a href="" target="_blank"><img src="<?php echo $imagename; ?>" alt=" "
                                                            width="350" height="350" /></a>

                                                </div>
                                                <ul class="pagination">

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="desc span_3_of_2">
                                    <h2>
                                        <?php echo $row['ProductName'];
                                        
                                        ?>
                                    </h2>
                                    <p>Category:
                                        <?php echo $row['Category']; ?>
                                    </p>
                                    <p>From:
                                        <?php
                                            echo $from;
                                            // echo $row['FoundFrom'];
                                             ?>
                                    </p>
                                    <p>Contact:
                                        <?php echo $row['ContactNumber']; ?>
                                    </p>
                                    <p>Email Address:<span>
                                            <?php echo $row['EmailAdd']; ?>
                                        </span></p>
                                    <div class="price">
                                        <p>Found By: <span>
                                                <?php echo $row['PersonName']; ?>
                                            </span></p>
                                    </div>

                                    
                                    <div class="share-desc">
                                        
                                        <div class="button"><span><a href="">Inform about Item</a></span></div>
                                    </div>

                                </div>

                            </div>




                        </div>


                    </div>
                </div>
            </div>
                 
                    


            <?php
                }
            }
        }

            ?>
    </div>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#horizontalTab').easyResponsiveTabs({
                type: 'default', //Types: default, vertical, accordion           
                width: 'auto', //auto or any width like 600px
                fit: true // 100% fit in a container
            });
        });
    </script>
    <div class="content_bottom">
        <div class="heading">

        </div>
        <div class="see">

        </div>
        <div class="clear"></div>
    </div>
    <div class="section group">


    </div>
    </div>
    </div>
    <div class="copy_right">
        <p>© All rights Reseverd | <a href="http://www.iitj.ac.in">IIT Jodhpur</a> </p>
    </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            $().UItoTop({
                easingType: 'easeOutQuart'
            });

        });
    </script>
    <a href="#" id="toTop"><span id="toTopHover"> </span></a>
</body>

</html>


<!-- <?php
if (isset($_GET["id"])) {
    include('config.php');
    $id = (int) $_GET["id"];

    $query = "Select *from foundmaster where FoundID='{$id}'";
    $result = mysqli_query($con, $query) or die(mysqli_error($con));

    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $to = $row['EmailAdd'];
    $from = $login_session;
    $subject = "Asked For Item : " . $row['ProductName'];
    $message = $from . " has asked for the item you have uploaded. Please Respond " . $to . " by Email :" . $to . " or By Mobile Number: " . $row['ContactNumber'];
    mail($to, $subject, $message);

}

if (isset($_GET["idlost"])) {
    include('config.php');
    $id = (int) $_GET["idlost"];

    $query = "Select *from lostmaster where LostID='{$id}'";
    $result = mysqli_query($con, $query) or die(mysqli_error($con));

    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $to = $row['EmailAdd'];
    $from = $login_session;
    $subject = "Asked For Item : " . $row['ProductName'];
    $message = $from . " has found the item you have uploaded. Please Respond " . $to . " by Email :" . $to . " or By Mobile Number: " . $row['ContactNumber'];
    mail($to, $subject, $message);

}

?> -->