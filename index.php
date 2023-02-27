<?php
declare(strict_types = 1);                               
 require 'includes/database-connection.php';              
require 'includes/functions.php';                       

$sql = "SELECT a.ma_bviet, a.tieude, a.ten_bhat, a.ma_tloai, a.tomtat,a.hinhanh
          FROM baiviet    AS a
      ORDER BY a.ma_bviet ASC
         LIMIT 6;";                                      
$articles = pdo($pdo, $sql)->fetchAll();                 

               
?>

<?php require_once 'includes/header.php'; ?>
<?php require_once 'includes/slider.php'; ?>

    <main class="container-fluid mt-3">
        <h3 class="text-center text-uppercase mb-3 text-primary">TOP bài hát yêu thích</h3>
        <div class="row">
            <?php foreach ($articles as $article) { ?>
            <div class="col-sm-3">
                <div class="card mb-2" style="width: 100%;">
                    <img src="<?= $article['hinhanh'] ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-center">
                            <a href="detail.php?id=<?= $article['ma_bviet'] ?>" class="text-decoration-none"><?= html_escape($article['ten_bhat']) ?></a>
                        </h5>
                    </div>
                </div>
            </div>
          
           
        <?php } ?>
    </main>
<?php include 'includes/footer.php';?>