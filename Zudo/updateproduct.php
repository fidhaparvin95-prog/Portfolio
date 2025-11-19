/<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>ZUDO</title>
    <link rel="icon" type="image/png" href="images/logo.png">
</head>

<body>
    <?php
    $page = "updateproduct";
    include 'adminheader.php';
    ?>
    <div class="container-fluid" style="margin-top:130px;">
        <div class="row">
            <div class="col-md-4">
            <center>
    <form name="addproduct" id="addproduct" method="post" action="addproductcontrol.php" onsubmit="return validateaddproduct()"
            enctype="multipart/form-data" style="background-color: rgb(128,128,128,0.1);height:450px;width:100%;border-radius: 10px;">
            
                <table>
                    <tr style="height: 50px;">
                        <th colspan="2" style="text-align: center;font-size: 3rem;padding:2%;">
                            ADD NEW PRODUCT
                        </th>
                    </tr>
                    
                    <tr>
                        <td style="font-size: 2rem;width: 100%;height: 40px;">Product Name</td>
                        <td><input type="text" name="pname" id="pname" style="height:35px;border-radius:10px;"></td>
                    </tr>
                    <tr>
                        <td style="font-size: 2rem;width: 100%;height: 40px;">Category</td>
                        <td>
                            <select id="category" name="category" style="width: 64%;height:35px;border-radius:10px;background-color:rgb(128,128,128,0.5);border-color:rgb(128,128,128,0.5);color:white;">
                                <option value="">select</option>
                                <option value="mens">mens</option>
                                <option value="womens">womens</option>
                                <option value="boys">boys</option>
                                <option value="girls">girls</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td style="font-size: 2rem;width: 100%;height: 40px;">Price</td>
                        <td><input type="text" name="pri" id="pri" style="height:35px;border-radius:10px;"></td>
                    </tr>
                    <tr>
                        <td style="font-size: 2rem;width: 100%;height: 40px;">Available sizes</td>
                        <td><input type="text" name="psize" id="psize" style="height:35px;border-radius:10px;"></td>
                    </tr>
                    <tr>
                        <td style="font-size: 2rem;width: 100%;height: 40px;">Product Image</td>
                        <td>
                            <input type="file" name="img" id="img" accept="image/*" style="background:none;">
                    </td>
                    </tr>
                    <tr>
                        <td style="font-size: 2rem;width: 100%;height: 40px;">Status</td>
                        <td>
                            <select id="pstatus" name="pstatus" style="width: 64%;height:35px;border-radius:10px;background-color:rgb(128,128,128,0.5);border-color:rgb(128,128,128,0.5);color:white;">
                                <option value="">select</option>
                                <option value="in-stock">in-stock</option>
                                <option value="out of stock">out of stock</option>
                            </select>
                        </td>
                    </tr>
                    <tr style="height: 60px;">
                        <td align="center"><input type="reset" name="rst" id="rst" value="Reset"
                                style="width: 100px;height: 40px;border-radius: 10px;background-color: black;color: white;font-size: 1.6rem;">
                        </td>
                        <td align="center"><input type="submit" name="sub" id="sub" value="Upload"
                                style="width: 100px;height: 40px;border-radius: 10px;background-color: black;color: white;font-size: 1.6rem;">
                        </td>
                    </tr>
                </table>
                <h5 align="center" style="color:<?php if (isset($_GET["mssg"])) {
                    print("green");
                } else {
                    print("red");
                } ?>">
                    <?php if (isset($_GET["mssg"])) {
                        print("Product Added");
                    }  ?>
                </h5>
        </form>
        </center>
            </div>
            <div class="col-md-4">
            <center>
    <form name="deleteproduct" id="deleteproduct" method="post" action="deleteproductcontrol.php" onsubmit="return validatedeleteproduct()"
            enctype="multipart/form-data" style="background-color: rgb(128,128,128,0.1);height:450px;width:100%;border-radius: 10px;">
            
                <table width=100%>
                    <tr style="height: 50px;">
                        <th colspan="2" style="text-align: center;font-size: 3rem;padding:2%;">
                            DELETE PRODUCT
                        </th>
                    </tr>
                    
                    <tr>
                        <td style="font-size: 2rem;width: 50%;height: 40px;">Enter Product ID</td>
                        
                    </tr>     
                    <tr>
                    <td><input type="number" name="pno" id="pno" style="height:35px;border-radius:10px;"></td>
                    </tr>             
                    <tr style="height: 60px;">
                        <td colspan="2" align="center" style="height:30px;">
                            <input type="submit" name="sub" id="sub" value="Delete"
                                style="width: 100px;height: 40px;border-radius: 10px;background-color: black;color: white;font-size: 1.6rem;">
                        </td>
                    </tr>
                </table>
                <h5 align="center" style="color:<?php if (isset($_GET["mssg"])) {
                    print("green");
                } else {
                    print("red");
                } ?>">
                    <?php if (isset($_GET["msg"])) {
                        print("Product Deleted");
                    } elseif (isset($_GET["errormssg"])) {
                        print("Product Id does not exist");
                    } ?>
                </h5>
        </form>
        </center>
            </div>
            <div class="col-md-4" style="background-color: rgb(128,128,128,0.1);height:450px;border-radius: 10px;">
            <center>
    <form name="searchproduct" id="searchproduct" method="get" action="searchproduct.php" onsubmit="return validatesearchproduct()"
    style="width:100%;">
             <table width=100% >
                    <tr style="height: 50px;">
                        <th colspan="2" style="text-align: center;font-size: 3rem;padding:2%;">
                            EDIT PRODUCT
                        </th>
                    </tr>
                    <?php
    $conn = mysqli_connect("Localhost", "root", "");
    mysqli_select_db($conn, 'zudo');
    $q = "select * from `product`";

    $rs = mysqli_query($conn, $q);
    
    ?>
                    
                    <tr>
                        <td style="font-size: 2rem;width: 50%;height: 40px;"> Select Product ID</td>
                        <td><select id="pno" name="pno" style="width: 64%;height:35px;border-radius:10px;background-color:rgb(128,128,128,0.5);border-color:rgb(128,128,128,0.5);color:white;">
                                
                        <option value="">select</option>
                        <?php while($row = mysqli_fetch_array($rs)){?>
                                <option value="<?php print($row["product id"]);?>"><?php print($row["product id"]);?></option>
                                <?php
                        } ?>
                            </select>
                            <input type="submit" name="sub" id="sub" value="Go"
                                style="width: 50px;height: 40px;border-radius: 10px;background-color: black;color: white;font-size: 1.6rem;">
                        
                        </td>                           
                    </tr>  
                   
    
                    </table>   
             </form>
             <form>
                <table>
                <?php
                
                 if (isset($_GET["id"])){
                $id=$_GET["id"];
                // print $id;
                
                $q="select * from `product` where `product id`= '$id'";
                // print $q;
                 
                $rs = mysqli_query($conn, $q);
                while($row=mysqli_fetch_array($rs)){
               $pid=  $row["product id"];
               $pname= $row["product name"];
               $category= $row["category"];
               $price= $row["price"];
               $size= $row["available size"];
               $pimage= $row["product image"];
               $status= $row["status"];
                }
            }
               mysqli_close($conn);
                ?>
                
                <tr>
                        <td style="font-size: 2rem;width: 50%;height: 40px;">Product ID</td>
                        <td><input type="number" name="pno" id="pno" value="<?php print($pid);?>" style="height:35px;border-radius:10px;"></td>
                    </tr> 
                    <tr>
                        <td style="font-size: 2rem;width: 50%;height: 40px;">Product Name</td>
                        <td><input type="text" name="pname" id="pname"  value="<?php if(isset($_GET["id"])) {print($pname);}?>" style="height:35px;border-radius:10px;"></td>
                    </tr>
                    <tr>
                        <td style="font-size: 2rem;width: 50%;height: 40px;">Category</td>
                        <td>
                            <select id="category" name="category" style="width: 100%;height:35px;border-radius:10px;background-color:rgb(128,128,128,0.5);border-color:rgb(128,128,128,0.5);color:white;">
                                <option value="<?php print($category);?>"><?php if(isset($_GET["id"])) {print($category);}?></option>
                                <option value="mens">mens</option>
                                <option value="womens">womens</option>
                                <option value="boys">boys</option>
                                <option value="girls">girls</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td style="font-size: 2rem;width: 50%;height: 40px;">Price</td>
                        <td><input type="number" name="pri" id="pri" value="<?php print($price);?>" style="height:35px;border-radius:10px;"></td>
                    </tr>
                    <tr>
                        <td style="font-size: 2rem;width: 50%;height: 40px;">Available sizes</td>
                        <td><input type="text" name="psize" id="psize" value="<?php if(isset($_GET["id"])) {print($size);}?>" style="height:35px;border-radius:10px;"></td>
                    </tr>
                    <tr>
                        <td style="font-size: 2rem;width: 50%;height: 40px;">Status</td>
                        <td>
                            <select id="pstatus" name="pstatus" style="width: 100%;height:35px;border-radius:10px;background-color:rgb(128,128,128,0.5);border-color:rgb(128,128,128,0.5);color:white;">
                                <option value="select"><?php if(isset($_GET["id"])) {print($status);}?></option>
                                <option value="in-stock">in-stock</option>
                                <option value="out of stock">out of stock</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                    <td colspan="2" align="center"><input type="submit" name="sub" id="sub" value="Update"
                                style="width: 100px;height: 40px;border-radius: 10px;background-color: black;color: white;font-size: 1.6rem;">
                        </td>
                    </tr>
                </table>
             </form>

        </center>
            </div>
        </div>
    </div>
    <footer>
        <div class="fixedfooter">
            <p>Copyright © 2023 Zudo Inc</p>
        </div>
    </footer>
    <script src="script.js"></script>
</body>

</html>
