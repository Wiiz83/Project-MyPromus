 <script type="text/javascript">


    $(document).ready(function() {  
      
    //set opacity to 0.4 for all the images  
    //opacity = 1 - completely opaque  
    //opacity = 0 - invisible  
      
    $('.icons img').css('opacity', 0.5);  
      
    // when hover over the selected image change the opacity to 1  
    $('.icons li').hover(  
       function(){  
          $(this).find('img').stop().fadeTo('slow', 1);  
       },  
       function(){  
          $(this).find('img').stop().fadeTo('slow', 0.5);  
       });  
      
  

    $("#notifications").click(function()
    {
        $("#settingsContainer").fadeOut();
        $("#notificationContainer").fadeToggle(300);
        $("#notification_count").fadeOut("slow");
        return false;
    });

    //Document Click hiding the popup 
    $(document).click(function()
    {
          $("#notificationContainer").hide();
    });


   

     $("#settings").click(function()
    {
        $("#notificationContainer").fadeOut();
        $("#settingsContainer").fadeToggle(300);
        $("#settings_count").fadeOut("slow");
        return false;
    });

    //Document Click hiding the popup 
    $(document).click(function()
    {
          $("#settingsContainer").hide();
    });
 

 });  


</script>





<body>
    <div class="top-menu">
        <div class="topmenu-left">
            <h1> <?php echo "$titlePage";?> </h1> 
                            </div>

                            <div class="topmenu-right">

                        <nav>
                            <ul id="icons">

                                <li id="notifications_li">
                      
                                    <a id="notifications" href="#"><span id="notification_count"><p style="margin-top:-4px;">3</p></span><img src="../view/assets/images/notifications.png"></a>

                                    <div id="notificationContainer">
                                    <div id="notificationTitle">Notifications</div>
                                    <div id="notificationsBody" class="notifications">
                                        <ul>
                                            <li>

                                                <a href="#">
                                                    <img src="../view/assets/images/icon-friends-active.png" alt="notification icon">
                                                    <span> Ferran has invited you to his event. </span>
                                                </a>

                                            </li>

                                            <li>

                                                <a href="#">
                                                    <img src="../view/assets/images/icon-friends-active.png" alt="notification icon">
                                                    <span> Ferran has invited you to his event. </span>
                                                </a>

                                            </li>

                                            <li>

                                                <a href="#">
                                                    <img src="../view/assets/images/icon-events-active.png" alt="notification icon">
                                                    <span> Ferran has invited you to his event. </span>
                                                </a>

                                            </li>

                                            <li>

                                                <a href="http://www.google.com">
                                                    <img src="../view/assets/images/icon-events-active.png" alt="notification icon">
                                                    <span> Ferran has invited you to his event. </span>
                                                </a>

                                            </li>

                                            <li>
                                                <a href="#">
                                                    <img src="../view/assets/images/icon-events-active.png" alt="notification icon">
                                                    <span> Ferran has invited you to his event. </span>
                                                </a>

                                            </li>

                                        </ul>
                                    </div>
                                    <div id="notificationFooter"><a href="../controller/notifications.php">See All</a></div>
                                    </div>

                                </li>

                                <li id="settings_li">
                        
                                    <a id="settings" href="#"><img src="../view/assets/images/settings.png"></a>


                                    <div id="settingsContainer">
                                    <div id="settingsTitle">Settings</div>
                                    <div id="settingsBody" class="settings">
                                        <ul>

                                            <li><a href="#">Account</a></li>
                                            <li><a href="#">Historic</a></li>
                                            <li><a href="#">Security</a></li>
                                            <li  class="limit-bot"><a href="#">Subscription</a></li>
                                            <li><a href="#">About Us</a></li>
                                            <li><a href="#">Help</a></li>


                                        </ul>   

                                    </div>
                                    <div id="settingsFooter"><input class="btn" type="submit" name="submit" value="Log Out" onclick="window.location.href='../controller/logout.php'"></div>
                                    </div>
                                </li>

                                <li>
                                    <a href="../controller/profile.php"><img src="<?php echo $_SESSION['userImage']; ?>" ></a>
                                </li>

                            </ul>
                        </nav>
                    </div>
                </div>

                <div class="black-bar">



                    <div class="left-menu">
                        <a href="../controller/dashboard.php">
                            <img src="../view/assets/images/logo2.png" alt="My Promus logo">
                        </a>

                        <nav>
                            <ul class="icons">

                              <li>
                                 <a href="../controller/search-friends.php"><img src="../view/assets/images/icon-search.png" alt="Calendar icon">Search</a>
                             </li>

                                <li>
                                 <a href="../controller/calendarView.php"><img src="../view/assets/images/icon-calendar.png" alt="Calendar icon">Calendar</a>
                             </li>

                             <li>
                                 <a href="../controller/events.php"><img src="../view/assets/images/icon-events.png" alt="Events icon">Events</a>
                             </li>

                             <li>
                                <a href="../controller/friends.php"><img src="../view/assets/images/icon-friends.png" alt="Friends icon">Friends</a>
                            </li>

                            </ul>

                            </nav>

                            <div class="menubar-new">
                                <a href="../controller/create-event.php"><img src="../view/assets/images/icon-addevent.png">Create Event</a>

                            </div>
                        </div>

                    </div>
