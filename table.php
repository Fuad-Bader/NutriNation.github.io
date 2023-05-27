
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <!-- Bootstrap CSS-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <link href="table.css" rel="stylesheet" media="all">

    <title>table</title>
</head>
<body>
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <!-- DATA TABLE -->
        <div class="table-data__tool">
            <div class="table-data__tool-left">
                <h2>table</h2>
                <div class="rs-select2--light rs-select2--md">
                    <select class="js-select2" name="property">
                        <option selected="selected">All Properties</option>
                        <option value="">Option 1</option>
                        <option value="">Option 2</option>
                    </select>
                    <div class="dropDownSelect2"></div>
                </div>
            </div>
         </div>
         <div class="table-responsive table-responsive-data2">
            <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
             <table class="table table-data2">
                 <thead>
                     <tr>
                         <th></th>
                         <th>Food</th>
                         <th>Type of food</th>                                                
                         <th>Calories(100gm)</th>
                     </tr>
                 </thead>
                 <tbody>
                    <?php
                    $qr="SELECT * FROM diet";
                    $rs= mysqli_query($conn,$qr);
                    while($diet= mysqli_fetch_assoc($rs)){
                     echo"<tr class='tr-shadow'>";
                         echo "<td>";
                         echo "    <label class='au-checkbox'>";
                         echo "        <input type='checkbox'>";
                         echo "        <span class='au-checkmark'></span>";
                         echo "    </label>";
                         echo "</td>";
                        echo"<td>{$diet['Food']}</td>";                         
                        echo"<td>{$diet['Type']}</td>";                         
                        echo"<td>{$diet['Calories']}</td>";                         
                     echo"</tr>"; 
                     echo"<tr class='spacer'></tr>";}
                     ?>
                     
                     <tr class="tr-shadow">
                         <td>
                             <label class="au-checkbox">
                                 <input type="checkbox">
                                 <span class="au-checkmark"></span>
                             </label>
                         </td>
                         <td>Lori Lynch</td>
                         <td class="desc">iPhone X 64Gb Grey</td>
                         
                         <td>$999.00</td>
                     </tr>
                     <tr class="spacer"></tr>
                     <tr class="tr-shadow">
                         <td>
                             <label class="au-checkbox">
                                 <input type="checkbox">
                                 <span class="au-checkmark"></span>
                             </label>
                         </td>
                         <td>Lori Lynch</td>
                         <td>
                             <span class="block-email">lyn@example.com</span>
                         </td>
                         
                         <td>$1199.00</td>
                         
                     </tr>
                     <tr class="spacer"></tr>
                     <tr class="tr-shadow">
                         <td>
                             <label class="au-checkbox">
                                 <input type="checkbox">
                                 <span class="au-checkmark"></span>
                             </label>
                         </td>
                         <td>Lori Lynch</td>
                         <td>
                             <span class="block-email">doe@example.com</span>
                         </td>
                         
                         <td>$699.00</td>
                         
                     </tr>
                 </tbody>
             </table>
         </div>
         <!-- END DATA TABLE -->
     </div>
 </div>    
</body>
</html>