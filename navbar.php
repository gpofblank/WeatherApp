<!-- Navbar -->
<nav class="navbar navbar-expand-md navbar-dark">
  <a href="index.php"><img src="img/logo50-50.png" class="navbar-brand pl-1" alt="The Time Tracking Tool"></a>
  
  <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbars4" aria-controls="navbars4" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  
  <div class="collapse navbar-collapse" id="navbars4">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item ml-auto">
        <a class="nav-link active" href="welcome.php">Home</a>
      </li>
        <li class="nav-item ml-auto" id="Favourites">
      </li>
    </ul>
    
    <!-- Welcome Back -->
    <?php
    if(ISSET($_SESSION['LoggedUser'])){
      ?>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item ml-auto">
          <a class="nav-link"><?php echo ' | Welcome back, ' . $_SESSION['LoggedUser'] . ' | '?></a>
        </li>
        <?php
      }
      ?>
      
      <!-- Log Out -->
      <li class="nav-item ml-auto">
        <a class="nav-link" href="logout.php">Log Out</a>
      </li>
    </ul>
  </div>
</nav>

<!-- Script to switch between active classes -->
<script type="text/javascript">
$('.navbar-nav .nav-link').click(function(){
  $('.navbar-nav .nav-link').removeClass('active');
  $(this).addClass('active');
})
</script>
