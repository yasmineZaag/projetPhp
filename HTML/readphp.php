<?php
//require_once 'includes/controller.php'  ;
$conn = mysqli_connect("localhost", "root", "", "registration");
    
  // Check connection
  if($conn === false){
      die("ERROR: Could not connect. " 
. mysqli_connect_error());
  }
$sql = " SELECT * FROM college";
$requete = $conn->query($sql);
$articles = $requete->fetch_all();


?>


<div class="row mb-2">

                                    <?php
                                        $sql = "SELECT * FROM college
                                                LIMIT 6";
                                        $stmt = mysqli_stmt_init($conn);    

                                        if (!mysqli_stmt_prepare($stmt, $sql))
                                        {
                                            die('SQL error');
                                        }
                                        else
                                        {
                                            mysqli_stmt_execute($stmt);
                                            $result = mysqli_stmt_get_result($stmt);


                                            while ($row = mysqli_fetch_assoc($result))
                                            {
                                              foreach($result as $res):
                                                echo $row['id'].$row['title'].$row['skils'].$row['price'];
                                                echo '<div class="col-md-6">
                                                        <div class="card flex-md-row mb-4 shadow-sm h-md-250">
                                                        <a href="posts.php?topic='.$row['id'].'">
                                                        <img class="card-img-left flex-auto d-none d-lg-block blogindex-cover" 
                                                                src="img/forum-cover.png" alt="Card image cap">
                                                                </a>
                                                          <div class="card-body d-flex flex-column align-items-start">
                                                            <strong class="d-inline-block mb-2 text-primary text-center  ml-auto">
                                                                <i class="fa fa-chevron-up" aria-hidden="true"></i><br>'.$row['title'].'
                                                            </strong>
                                                            <h6 class="mb-0">
                                                              <a class="text-dark" href="posts.php?topic='.$row['skils'].'">
                                                               </a>
                                                            </h6>
                                                           
                                                          </div>

                                                        </div>
                                                      </div>';
                                              endforeach;
                                            }
                                        }
                                    ?>        


                                </div>





<p> liste des articles </p>
<section>
<?php foreach($articles as $article): ?>

    <article>
<h1>title<?= $article["title"] ?></h1>
<p>skils <?=$article["skils"]?></p>
<div><?= $article["category"]?></div>

    </article>
<?php endforeach;?>
</section>
