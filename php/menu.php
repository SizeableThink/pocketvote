<nav id="nav">
   <ul>
      <li>
          <a <?php echo ($page == 'one') ? "class='button special'" : ""; ?> 
                 href="home.html.php">Home</a>
      </li>
      <li>
          <a <?php echo ($page == 'two') ? "class='button special'" : ""; ?> 
                  href="background.html.php">Background</a>
      </li>
      <li>
          <a <?php echo ($page == 'three') ? "class='button special'" : ""; ?> 
                  href="votingmethods.html.php">Voting Methods</a>
      </li>
      <li>
          <a <?php echo ($page == 'four') ? "class='button special'" : ""; ?> 
                 href="demoBallot.html.php#method">Ballot Demo</a>
      </li>

        <?php
        if(isset($_SESSION['firstname'])){ ?>

            <li><a <?php echo ($page == 'five') ? "class='button special'" : ""; ?> href="createballot.html.php">Create Ballot</a></li>

            <li id="logout">Hi <?php echo $_SESSION['firstname'];?>, (<a  href="home.html.php?logout=1" >Logout</a>)</li>

       <?php }else{ ?>

           <li><a href="signin.html.php" >Login</a></li>
      <?php  } ?>


   </ul>
</nav>

<script type="text/javascript">

  // document.getElementById("logout").onclick = function(){
  //     alert("hi");
  //     document.getElementById("logout").innerHTML = "<a href='signin.html.php' >Login</a>";

  // };
</script>
