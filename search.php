<?php
declare(strict_types = 1);                                // Use strict types
require 'includes/database-connection.php';               // Create PDO object
require 'includes/functions.php';                         // Include functions

$term  = filter_input(INPUT_GET, 'term');                 // Get search term

$arguments['term'] = '%' . $term .'%';   

 $sql = "SELECT * FROM baiviet AS a WHERE a.ten_bhat LIKE :term;";                              
$articles = pdo($pdo, $sql, $arguments)->fetchAll(); 

?>
<?php include 'includes/header.php'; ?>
 
  <main class="container-fluid mt-3">
        <h3 class="text-center text-uppercase mb-3 text-primary">Kết quả tìm kiếm cho: <?= $term ?></h3>
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
<?php include 'includes/footer.php'; ?>