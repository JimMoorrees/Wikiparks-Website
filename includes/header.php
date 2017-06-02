<header>
  <nav class="navbar navbar-inverse" style="border-radius: 0px; background-color: darkorange;">
    <div class="container-fluid">
      <div class="navbar-header"> 
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>                        
        </button>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
          <li class="active"><a href="index.php" style="background-color: darkorange;" >Home</a></li>
          <li><a href="#">About</a></li>
          <li><a href="#">FAQ</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <?php if(isset($_SESSION['user_id'])): ?>
            <li><a href="#"><span class="glyphicon glyphicon-thumbs-up"></span> Welcome</a></li>
          <?php else: ?>
            <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
            <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </nav>
</header>