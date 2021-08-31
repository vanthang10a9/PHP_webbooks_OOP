<?php
include_once "../../Class/Customer.php";
$customrerModel = new CustomerModel();

?>

<label for="cars">Choose a person:</label>

<?php
$result = $customrerModel->getAll();
if ($result->num_rows > 0) {
    
    echo "<select name='cars' id='cars'>";
    while ($row = $result->fetch_assoc()) {
        echo "<option value=" .  $row['customerID'] . ">" . $row['Name'] . "</option>";
        

        echo "
        <div class='info-hide' id='" .  $row['customerID'] . "'>
            <div>Thông tin người dùng</div>
            <div>Tên: " . $row['Name']  . "</div>
            <div>Địa chỉ: " . $row['Address']  . "</div>
            <div>Thành phố: " . $row['City']  . "</div>    
        </div> 
        ";
    }
    echo "</select>";
}
?>






<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    
</script>

<style>
    .info-hide {
        /* display: none; */
    }
</style>