

<div id="blue_bar">
  <form method="get" >
  <span style="color: white; float:left;margin:auto;font-size: 30px;">BLOG</span>
      <div style="width: 800px;margin:auto;font-size: 30px;">
          
          <a href="index.php?id=<?= $_SESSION['id'] ?>" style="color: white;">Accueil</a> &nbsp 
          <a href="profile.php?id=<?= $_SESSION['id'] ?>" style="color: white;">Profil</a> &nbsp
          
          <?php 
            if(isset($_SESSION['auth'])){
              ?>
              
          
                <a href="BDD/users/logoutAction.php">
                <span style="font-size:11px;float: right;margin:10px;color:white;">Log out</span>
                </a>
              <?php
            }
          ?>
    

      </div>
  </form>
</div>