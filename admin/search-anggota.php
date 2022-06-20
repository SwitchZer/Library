<?php

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `user` WHERE CONCAT(`id_user`, `username`, `nama`, `email`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM `user`";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    include 'connect.php';
    $filter_Result = mysqli_query($conn, $query);
    return $filter_Result;
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>PHP HTML TABLE DATA SEARCH</title>
        <style>
            table,tr,th,td
            {
                border: 1px solid black;
            }
        </style>
    </head>
    <body>
        
        <form action="search-anggota.php" method="post">
            <input type="text" name="valueToSearch" placeholder="Value To Search"><br><br>
            <input type="submit" name="search" value="Filter"><br><br>
            
            <table>
                <tr>
                    <th>Id</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Age</th>
                </tr>

      <!-- populate table from mysql database -->
      <?php
         while($hasil = mysqli_fetch_array($search_result)){
        ?>
        <tr style = "">
            <td>
                <?php echo $hasil['id_user'] ?>
            </td>
            <td>
            <?php echo $hasil['username'] ?>
            </td>
            <td>
            <?php echo $hasil['nama'] ?>
            </td>
            <td>
            <?php echo $hasil['email'] ?>
            </td>
            <td>
                <a class="badge badge-secondary" href=edit.php?id=<?php echo $hasil['id_user'] ?>>Edit</a>
                <a class="badge badge-danger" href="delete-anggota.php?id=<?php echo $hasil['id_user'] ?>">Hapus</a> 
            </td>
        </tr>
        <?php } ?>
            </table>
        </form>
        
    </body>
</html>