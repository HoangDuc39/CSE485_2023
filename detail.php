<?php
declare(strict_types = 1);                                
require 'includes/database-connection.php';               
require 'includes/functions.php';                        

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT); 
if (!$id) {                                               
    include 'page-not-found.php';                        
}

$sql = "SELECT * FROM baiviet as bv
JOIN tacgia    AS tg  ON bv.ma_bviet = tg.ma_tgia
JOIN theloai      AS tl  ON bv.ma_bviet = tl.ma_tloai
WHERE ma_bviet = :id  ;";         

$article = pdo($pdo, $sql, [$id])->fetch();               
if (!$article) {                                          
    include 'page-not-found.php';                       
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
                        <p class="card-text"><span class=" fw-bold">Thể loại: </span><?= html_escape($article['ten_tloai']) ?></p>
                        <p class="card-text"><span class=" fw-bold">Tóm tắt: </span><?= html_escape($article['tomtat']) ?></p>
                        <p class="card-text"><span class=" fw-bold">Nội dung: </span><?= html_escape($article['noidung']) ?></p>
                        <p class="card-text"><span class=" fw-bold">Tác giả: </span><?= html_escape($article['ten_tgia']) ?></p>

                    </div>          
        </div>
    </main>
    <?php require_once 'includes/footer.php'; ?>