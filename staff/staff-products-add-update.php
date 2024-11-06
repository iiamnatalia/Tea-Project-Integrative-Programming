<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require('../database/connections/conx-staff.php');

    print_r($_POST);

$prodId = $_POST['productId'];
$prodName = isset($_POST['addProdName']) ? $_POST['addProdName'] : $_POST['editProdName'];
$prodCategory = isset($_POST['addProdCategory']) ? $_POST['addProdCategory'] : $_POST['editProdCategory'];
$prodPrice = isset($_POST['addProdPrice']) ? $_POST['addProdPrice'] : $_POST['editProdPrice'];
$processType = $_POST['process_type'];

print_r($_POST);
print($prodName);
print($prodCategory);
print($prodPrice);
print($processType);
print ($prodId);

if (empty($prodName) || empty($prodCategory) || empty($prodPrice)) {

} else {
    try {
        $pdo->beginTransaction();

        if ($processType == 'Update') {
            print_r($_POST);
            print($prodName);
            print($prodCategory);
            print($prodPrice);
            print($processType);
            print($prodId);

            $sql = "UPDATE `products` SET `prod_name` = :prodName, `prod_category` = :prodCategory, `prod_base_price` = :prodPrice WHERE `prod_id` = :prodId";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([':prodName' => $prodName, ':prodCategory' => $prodCategory, ':prodPrice' => $prodPrice, ':prodId' => $prodId]);
            $addMessage = "The product $prodName has been successfully updated.";
        $pdo->commit();
        } else if ($processType == 'Add') {
                      // Check for redundant product name in the same category
            $sqlCheckRedundant = "SELECT * FROM `products` WHERE `prod_name` = :prodName AND `prod_category` = :prodCategory";
            $stmt = $pdo->prepare($sqlCheckRedundant);
            $stmt->execute([':prodName' => $prodName, ':prodCategory' => $prodCategory]);
            $redundantProduct = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($redundantProduct && $redundantProduct['prod_id'] != $prodId) {
                echo '<script type="text/javascript">
                        alert("You cannot add redundant products.");
                        window.location.href = "staff-products-management.php";
                    </script>';
                $pdo->rollBack();
                exit();
            }

            if (isset($_FILES["addProdImage"]) && $_FILES["addProdImage"]["error"] == 0) {
                $target_dir = "../assets/products/";
                $file_name_dir = "assets/products/";
                $imageFileType = strtolower(pathinfo($_FILES["addProdImage"]["name"], PATHINFO_EXTENSION));
                $target_file = $target_dir . $prodName . "." . $imageFileType;
                $file_name = $file_name_dir  . $prodName . "." . $imageFileType;
                $uploadOk = 1;

                $check = getimagesize($_FILES["addProdImage"]["tmp_name"]);
                if ($check !== false) {
                    $uploadOk = 1;
                } else {
                    $addMessage = "File is not an image.";
                    $uploadOk = 0;
                }

                if (file_exists($target_file)) {
                    $addMessage = "Sorry, file already exists.";
                    $uploadOk = 0;
                }

                if ($_FILES["addProdImage"]["size"] > 5000000) {
                    $addMessage = "Sorry, your file is too large.";
                    $uploadOk = 0;
                }

                if (!in_array($imageFileType, array("jpg", "png", "jpeg"))) {
                    $addMessage = "Sorry, only JPG, JPEG, & PNG files are allowed.";
                    $uploadOk = 0;
                }

                if ($uploadOk == 1) {
                    if (move_uploaded_file($_FILES["addProdImage"]["tmp_name"], $target_file)) {
                        $sql = "INSERT INTO `products` (`prod_name`, `prod_category`, `prod_base_price`, `prod_img`) VALUES (:prodName, :prodCategory, :prodPrice, :targetFile)";
                        $stmt = $pdo->prepare($sql);
                        $stmt->execute([':prodName' => $prodName, ':prodCategory' => $prodCategory, ':prodPrice' => $prodPrice, ':targetFile' => $file_name]);
                        $addMessage = "The product $prodName has been successfully added.";
                    } else {
                        $addMessage = "No image uploaded or error uploading image.";
                    }
                }
            } else {
                $addMessage = "Image upload error or no image provided.";
            }
                    $pdo->commit();
        }



        echo '<script type="text/javascript">
                alert("' . $addMessage . '");
                window.location.href = "staff-products-management.php";
            </script>';

    } catch (Exception $e) {
        $pdo->rollBack();
        echo '<script type="text/javascript">
                alert("Error: ' . $e->getMessage() . '");
                window.location.href = "admin-products.php";
            </script>';
    }
}
?>
