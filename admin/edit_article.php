<?php
declare(strict_types = 1);                           
require '../includes/database-connection.php';                   
require '../includes/functions.php'; 

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

$sql = "select ma_bviet,tieude,ten_bhat,ma_tloai,tomtat,noidung,ma_tgia from baiviet where ma_bviet = :id;";        
                     
$article0 = pdo($pdo, $sql, [$id])->fetch();   


session_start();

$article2="";
$article3="";
$article4="";
$article5="";
$article6="";
$article7="";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    
    $input_article2 = trim($_POST["td"]);
    $input_article3 = trim($_POST["tbh"]);
    $input_article4 = trim($_POST["mtl"]);
    $input_article5 = trim($_POST["tt"]);
  $input_article6 = trim($_POST["nd"]);
  $input_article7 = trim($_POST["mtg"]);

  $article2 =  $input_article2;
  $article3 =  $input_article3;
  $article4 =  $input_article4;
  $article5 =  $input_article5;
  $article6 =  $input_article6;
  $article7 =  $input_article7;
  
    
    
    
    
    if(true ){
        
        $sql = "UPDATE baiviet SET tieude=:tieude,ten_bhat=:ten_bhat,ma_tloai=:ma_tloai,tomtat=:tomtat,noidung=:noidung,ma_tgia=:ma_tgia WHERE ma_bviet  =:id";
 
        if($stmt = $pdo->prepare($sql)){
           
            $stmt->bindParam(":tieude", $param_tieude);
            $stmt->bindParam(":ten_bhat", $param_ten_bhat);
            $stmt->bindParam(":ma_tloai", $param_ma_tloai);
            $stmt->bindParam(":tomtat", $param_tomtat);
          
            $stmt->bindParam(":noidung", $param_noidung);
            $stmt->bindParam(":ma_tgia", $param_ma_tgia);

            $stmt->bindParam(":id", $param_id);
            
            $param_tieude=$article2;
            $param_ten_bhat=$article3;
            $param_ma_tloai=$article4;
            $param_tomtat=$article5;
            $param_noidung=$article6;
            $param_ma_tgia=$article7;
            $param_id = $id;
           
            if($stmt->execute()){
                header("location: article.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
       
        unset($stmt);
    }
    
   
    unset($pdo);
}
?>

<?php                              

$sql = "SELECT *
FROM theloai";                                      
$theloai = pdo($pdo, $sql)->fetchAll();                 
$sql1 = "SELECT *
FROM tacgia";
 $tacgia = pdo($pdo, $sql1)->fetchAll();                
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
                        <a class="nav-link" aria-current="page" href="./">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php">Trang ngoài</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active fw-bold" href="category.php">Thể loại</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="author.php">Tác giả</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="article.php">Bài viết</a>
                    </li>
                </ul>
                </div>
            </div>
        </nav>

    </header>
    <main class="container mt-5 mb-5">
       
        <div class="row">
            <div class="col-sm">
                <h3 class="text-center text-uppercase fw-bold">Sửa thông tin bài viết</h3>
                <form action="" method="post">
                <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatName">Mã bài viết</span>
                        <input value="<?= $article0['ma_bviet'] ?>" type="text" class="form-control"  readonly name="mbv">
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatName">Tiêu đề</span>
                        <input value="<?= $article0['tieude'] ?>" type="text" class="form-control" name="td" >
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatName">Tên bài hát</span>
                        <input value="<?= $article0['ten_bhat'] ?>" type="text" class="form-control" name="tbh" >
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatName">Mã thể loại</span>
                        <select name="mtl" id="">
                            <?php
                                foreach($theloai as $theloaies){
                                    echo "<option value='{$theloaies['ma_tloai']}'>{$theloaies['ten_tloai']}</option>";
                                }
                                ?>
                                }
                        </select>
                    </div>

                    
                    
                   
                        <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatName">Tóm tắt</span>
                        <div id="editor">
                        <input value="<?= $article0['tomtat'] ?>" type="text" class="form-control" name="tt" >
                    </div>
                </div>

                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatName">Nội dung</span>
                        <input value="<?= $article0['noidung'] ?>" type="text" class="form-control" name="nd" >
                    </div>
                    
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatName">Mã tác giả</span>
                        <select name="mtg"  id="">
                            <?php
                                foreach($tacgia as $tacgiaes){
                                    echo "<option value='{$tacgiaes['ma_tgia']}'>{$tacgiaes['ten_tgia']}</option>";
                                }
                                ?>
                                }
                        </select>
                    </div>
                    

                    <div class="form-group  float-end ">
                        <input type="submit" value="Thêm" class="btn btn-success">
                        <a href="article.php" class="btn btn-warning ">Quay lại</a>
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