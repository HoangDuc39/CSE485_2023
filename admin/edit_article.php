<?php
declare(strict_types = 1);                           
require '../includes/database-connection.php';                   
require '../includes/functions.php'; 

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

$sql = "SELECT * FROM baiviet as bv
JOIN tacgia    AS tg  ON bv.ma_bviet = tg.ma_tgia
JOIN theloai      AS tl  ON bv.ma_bviet = tl.ma_tloai 
where ma_bviet = :id;";         

$article = pdo($pdo, $sql, [$id])->fetch();  


session_start();

if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    $tieude = trim($_POST["tieude"]);
    $tenbaihat = trim($_POST["tenbaihat"]);
    $theloai = trim($_POST["theloai"]);
    $tomtat = trim($_POST["tomtat"]);
    $noidung = trim($_POST["noidung"]);
    $tacgia = trim($_POST["tacgia"]);
    $hinhanh = trim($_POST["hinhanh"]);
    
        
        $sql = "UPDATE baiviet SET tieude= :tieude,ten_bhat=:tenbaihat,tomtat=:tomtat,noidung=:noidung,ten_tgia=:tacgia,hinhanh=:hinhanh WHERE ma_bviet  =:id";
 
        if($stmt = $pdo->prepare($sql)){
           

            $stmt->bindParam(":id", $param_id);
            $stmt->bindParam(":tieude", $param_tieude);
            $stmt->bindParam(":tenbaihat", $param_tenbaihat);
            $stmt->bindParam(":theloai", $param_theloai);
            $stmt->bindParam(":tomtat", $param_tomtat);
            $stmt->bindParam(":noidung", $param_noidung);
            $stmt->bindParam(":tacgia", $param_tacgia);
            $stmt->bindParam(":hinhanh", $param_hinhanh);
    
            $param_tieude = $tieude;
            $param_tenbaihat = $tenbaihat;
            $param_theloai = $theloai;
            $param_tomtat = $tomtat;
            $param_noidung = $noidung;
            $param_tacgia = $tacgia;
            $param_hinhanh = $hinhanh;
            $param_id = $id;
           
            if($stmt->execute()){
                header("location: article.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
       
        unset($stmt);
    
    
   
    unset($pdo);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music for Life</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style_login.css">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary shadow p-3 bg-white rounded">
            <div class="container-fluid">
                <div class="h3">
                    <a class="navbar-brand" href="#">Administration</a>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="./">Trang ch???</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php">Trang ngo??i</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="category.php">Th??? lo???i</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="author.php">T??c gi???</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active fw-bold" href="article.php">B??i vi???t</a>
                    </li>
                </ul>
                </div>
            </div>
        </nav>

    </header>
    <main class="container mt-5 mb-5">
       
        <div class="row">
            <div class="col-sm">
                <h3 class="text-center text-uppercase fw-bold">S???a th??ng tin b??i vi???t</h3>
                <form action="" method="post">
                <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatId">M?? b??i vi???t</span>
                        <input type="text" class="form-control" name="txtCatId" readonly value="<?= $article['ma_bviet'] ?>">
                    </div>

                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatName">Ti??u ?????</span>
                        <input type="text" class="form-control" name="tieude" value = "<?= $article['tieude'] ?>">
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatName">T??n b??i h??t</span>
                        <input type="text" class="form-control" name="tenbaihat" value = "<?= $article['ten_bhat'] ?>">
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatName">Th??? lo???i</span>
                        <input type="text" class="form-control" name="theloai" value = "<?= $article['ten_tloai'] ?>">
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatName">T??m t???t</span>
                        <input type="text" class="form-control" name="tomtat" value = "<?= $article['tomtat'] ?>">
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatName">N???i dung</span>
                        <input type="text" class="form-control" name="noidung" value = "<?= $article['noidung'] ?>">
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatName">T??c gi???</span>
                        <input type="text" class="form-control" name="tacgia" value = "<?= $article['ten_tgia'] ?>">
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatName">H??nh ???nh</span>
                        <input type="text" class="form-control" name="hinhanh" value = "<?= $article['hinhanh'] ?>">
                    </div>
                    <div class="form-group  float-end ">
                        <input type="submit" value="L??u l???i" class="btn btn-success">
                        <a href="author.php" class="btn btn-warning ">Quay l???i</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <footer class="bg-white d-flex justify-content-center align-items-center border-top border-secondary  border-2" style="height:80px">
        <h4 class="text-center text-uppercase fw-bold">TLU's music garden</h4>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>