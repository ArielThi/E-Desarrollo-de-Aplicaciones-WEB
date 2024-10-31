<?php 
include "includes/header.php";
    // require '../MiniPoyecto/includes/conf/conectbd.php';
    require "includes/conf/conectbd.php";
    conectdb();
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = isset($_POST["id"]) ? $_POST["id"] : '';
    $name = isset($_POST["name"]) ? $_POST["name"] : '';
    $email = isset($_POST["email"]) ? $_POST["email"] : '';
    $phone = isset($_POST["phone"]) ? $_POST["phone"] : '';
    if (!empty($name) && !empty($email) && !empty($phone)) {
        $checkQuery = "SELECT id FROM sellers WHERE email = ?";
        $checkStmt = $db->prepare($checkQuery);
        $checkStmt->bind_param("s", $email);
        $checkStmt->execute();
        $checkStmt->store_result();
        if ($checkStmt->num_rows > 0) {
        } else {
            $query = "INSERT INTO sellers (name, email, phone) VALUES (?, ?, ?)";
            $stmt = $db->prepare($query);
            $stmt->bind_param("sss", $name, $email, $phone);
            $stmt->close();
        }
        $checkStmt->close();
    }
}
?>

<section>
    <h2>Sellers form</h2>
    <div>
        <form action="createSeller.php" method="POST">
            <fieldset>
                <legend>Fill all form fields</legend>
                <div>
                    <label for="name">Seller Name</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div>
                    <label for="email">Seller Email</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div>
                    <label for="phone">Seller Phone</label>
                    <input type="tel" id="phone" name="phone" required>
                </div>
                <div>
                    <button type="submit">Create a new seller</button>
                </div>
            </fieldset>
        </form>
    </div>
</section>

<?php
include "includes/footer.php";
?>
