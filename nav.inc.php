<?php
function nav($i=0){
    echo "
    <nav class='navbar navbar-default'>
      <div class='container-fluid'>
        <div class='navbar-header'>
          <button type='button' class='navbar-toggle collapsed' data-toggle='collapse' data-target='#bs-example-navbar-collapse-1' aria-expanded='false'>
            <span class='sr-only'>Toggle navigation</span>
            <span class='icon-bar'></span>
            <span class='icon-bar'></span>
            <span class='icon-bar'></span>
          </button>
          <a class='navbar-brand' href='./'>E-Chits</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class='collapse navbar-collapse' id='bs-example-navbar-collapse-1'>
          <ul class='nav navbar-nav navbar-right'>";

        if($i==0){
            echo "
    <li><form class='navbar-form navbar-right' action='./' method='POST'>
            <button type=button class='btn btn-default' onclick=\"window.location.href='./makechit.php'\">Make Chit</button>
            <div class='form-group'>
              <input type='text' class='form-control' name='FILTER' placeholder='Search Chit Description'>
            </div>
            <button type='submit' class='btn btn-default'>Find Chit</button>
          </form>
    </li>
            <li><a href='./about.php'>About Us</a></li>
            <li><a href='./logout.php'>Logout</a></li>";
        }else{
            echo "<li><a href='./about.php'>About Us</a></li>";
            echo "<li><a href='./login.php'>Login</a></li>";
        }
    echo "
    </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
      </nav>";
}
?>
