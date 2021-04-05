<?php include("entete2.php"); ?>

<div class="container">
    <div class="row">
        <div class="box">
            <div class="col-lg-12">
                <hr>
                <h2 class="intro-text text-center">
                    <strong>Panier</strong>
                </h2>
                <hr>
                <?php

                foreach ($_SESSION["panier"] as $key => $value) {
                    echo $key;
                    echo " : ";
                    echo $value;
                    echo "<br>";
                }
                ?>
                <table class="table">
    <thead>
      <tr>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>John</td>
        <td>Doe</td>
        <td>john@example.com</td>
      </tr>
      <tr>
        <td>Mary</td>
        <td>Moe</td>
        <td>mary@example.com</td>
      </tr>
      <tr>
        <td>July</td>
        <td>Dooley</td>
        <td>july@example.com</td>
      </tr>
    </tbody>
  </table>
            </div>	
            

            <div class="col-lg-12">

            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>




<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
</table>
</form>
</body>
</html>