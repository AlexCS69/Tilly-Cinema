<?php
include '../includes/dbhandler.php';

$result=mysqli_query($conn,"select id,itemdesc, description,sellingprice,QuantityInStock,product_image from items
   order by itemdesc")or die ("SQL Select FAILED!");

   while(list($id,$itemdesc,$description)=mysqli_fetch_array($result)) {
      echo $id .' - ' .$itemdesc .'<br>';
   }


 ?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title></title>
   </head>
   <body>
      <div class="table-responsive ps">
          <table class="table tablesorter " id="page1">
            <thead class=" text-primary">
              <tr>
                 <th>Image</th>
                <th>Name</th>
                <th>Price</th>
                <th><a class=" btn btn-primary" href="addproduct.php">Add New</a></th>
              </tr>
            </thead>
            <tbody>
               <tr>
                  <td>cell 1</td>
                  <td>cell 2</td>
                  <td>cell 3</td>
               </tr>



               <tr>
                  <td>cell 1</td>
                  <td>cell 2</td>
                  <td>cell 3</td>
               </tr>
            </tbody>
         </table>
      </div>
   </body>
</html>
