<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>welcome to Rat'em | sign in</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link type="text/css" rel="stylesheet" href="stylesheet/search.css"/>
        <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <script src="lib/jquery-1.11.3.min.js"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.2.8/jquery.form-validator.min.js"></script>
        <script src="js/login.js"></script>
        </head>
    <body>
      <header>
        <a href="homepage.html"><img src="ratem_small.png" alt="logo" id="logo"/></a>
      </header>
      <div class="show">
        <?php
        /**
         * @Author: Zhiying
         * @Date:   2015-12-07 00:40:46
         * @Last Modified by:   Zhiying
         * @Last Modified time: 2015-12-10 02:25:09
         */
        $search = $_POST["search"];
        if(!isset($search))
          $error = "you didn't submit a keyword";
        else {
          if( strlen( $search ) <= 1 )
            $error = "Search term too short";
          else { ?>
            <h4 id="info">
            <?php
            echo "You searched for <b> $search </b> <hr size='1' > </ br > "; ?>
            </h4>
            <?php
            $dsn = 'mysql:host=localhost; dbname=rpi_course';
            $username="root";
            $password="001219158101";
            $db=new PDO($dsn, $username, $password);
            $query="SELECT `name`, `score`
                    FROM courses
                    WHERE `name`= '$search'";
            $data=$db->query($query);
            if ($data) {
              $result=$data->fetchAll();
              if ($result==TRUE){
                $error = "";
                foreach ($result as $item) { ?>
                  <h3 id="result">
                  <?php echo $item['name'] . " : ";
                        if ($item['score']==0){ ?>
                          <i class="fa fa-star-o"></i>
                          <i class="fa fa-star-o"></i>
                          <i class="fa fa-star-o"></i>
                          <i class="fa fa-star-o"></i>
                          <i class="fa fa-star-o"></i>
                        <?php }
                        echo "<br>"; ?>
                  </h3>
                <?php }
              }
              else {
                $error = "Sorry cannot find result :(";
              }
            }
            else {
              $error = "Sorry cannot find result :(";
            }
              /*
              $search_exploded = explode ( " ", $search );
              $x = 0;
              foreach( $search_exploded as $search_each ) {
                $x++;
                $construct = "";
                if( $x == 1 )
                  $construct .="keywords LIKE '%$search_each%'";
                else
                  $construct .="AND keywords LIKE '%$search_each%'"; }
                $construct = " SELECT * FROM courses WHERE $construct ";
                $run = mysql_query( $construct );
                $foundnum = mysql_num_rows($run);
                if ($foundnum == 0)
                  echo "Sorry, there are no matching result for <b> $search </b>. </br> </br> 1. Try more general words. for example: If you want to search 'how to create a website' then use general keyword like 'create' 'website' </br> 2. Try different words with similar meaning </br> 3. Please check your spelling";
                else {
                  echo "$foundnum results found !<p>";
                  while( $runrows = mysql_fetch_assoc( $run ) ) {
                    $title = $runrows ['title'];
                    $desc = $runrows ['description'];
                    $url = $runrows ['url'];
                    echo "<a href='$url'> <b> $title </b> </a> <br> $desc <br> <a href='$url'> $url </a> <p>";
                  }
                }*/
              }
            }
            if ($error) { ?>
              <h3 id="error"><?php echo $error;?></h3>
            <?php }
          ?>
          </div>
        </body>
        </html>

