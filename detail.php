<?php
declare(strict_types = 1);                                // Use strict types
require 'includes/database-connection.php';               // Create PDO object
require 'includes/functions.php';                         // Include functions

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT); // Validate id
if (!$id) {                                               // If no valid id
    include 'page-not-found.php';                         // Page not found
}

$sql = "SELECT * FROM baiviet WHERE ma_bviet = :id  ;";         // SQL statement

$article = pdo($pdo, $sql, [$id])->fetch();               // Get article data
if (!$article) {                                          // If article not found
    include 'page-not-found.php';                         // Page not found
}

?>

<?php require_once 'includes/header.php'; ?>
    <main class="container mt-5">
        <!-- <h3 class="text-center text-uppercase mb-3 text-primary">CẢM NHẬN VỀ BÀI HÁT</h3> -->
       
                <div class="row mb-5">
                    <div class="col-sm-4">
                        <img src="<?= $article['hinhanh'] ?>" class="img-fluid" alt="...">
                    </div>
                    <div class="col-sm-8">
                        <h5 class="card-title mb-2">
                            <a href="" class="text-decoration-none"><?= html_escape($article['ten_bhat']) ?></a>
                        </h5>
                        <p class="card-text"><span class=" fw-bold">Bài hát: </span><?= html_escape($article['ten_bhat']) ?></p>
                        <p class="card-text"><span class=" fw-bold">Thể loại: </span>Nhạc trữ tình</p>
                        <p class="card-text"><span class=" fw-bold">Tóm tắt: </span><?= html_escape($article['tomtat']) ?></p>
                        <p class="card-text"><span class=" fw-bold">Nội dung: </span><?= html_escape($article['noidung']) ?></p>
                        <p class="card-text"><span class=" fw-bold">Tác giả: </span>Nguyễn Văn Giả</p>

                    </div>          
        </div>
    </main>
    <?php require_once 'includes/footer.php'; ?>