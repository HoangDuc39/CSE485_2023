<?php
declare(strict_types = 1);                                   
require '../includes/database-connection.php';                  
require '../includes/functions.php'; 
session_start();
$name = $address = $salary = "";
$name_err = $address_err = $salary_err = "";
 

if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    $input_category = trim($_POST["category"]);
    if(empty($input_category)){
        $category_err = "Please enter a category.";
    } 
     else{
        $category = $input_category;
    }
    
    
    
    
    if(empty($category_err) ){
        
        $sql = "INSERT INTO theloai (ma_tloai,ten_tloai) VALUES (NULL,:category)";
 
        if($stmt = $pdo->prepare($sql)){
            
            $stmt->bindParam(":category", $param_category);
         
            
           
            $param_category = $category;
            
           
            if($stmt->execute()){
                header("location: category.php");
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
                        <a class="nav-link active fw-bold" href="category.php">Th??? lo???i</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="author.php">T??c gi???</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="article.php">B??i vi???t</a>
                    </li>
                </ul>
                </div>
            </div>
        </nav>

    </header>
    <main class="container mt-5 mb-5">
       
        <div class="row">
            <div class="col-sm">
                <h3 class="text-center text-uppercase fw-bold">Th??m m???i th??? lo???i</h3>
                <span class="invalid-feedback"><?php echo $category_err;?></span>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatName">T??n th??? lo???i</span>
                        <input type="text" class="form-control" name="category" >
                    </div>

                    <div class="form-group  float-end ">
                        <input type="submit" value="Th??m" class="btn btn-success">
                        <a href="category.php" class="btn btn-warning ">Quay l???i</a>
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