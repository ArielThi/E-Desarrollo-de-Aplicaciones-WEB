<?php 
include "includes/header.php";
    // require '../MiniPoyecto/includes/conf/conectbd.php';
    require "includes/conf/conectbd.php";
    conectdb();

$query_sellers = "SELECT id, name FROM sellers;";
$sellers = mysqli_query($db, $query_sellers);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $title = isset($_POST["title"]) ? mysqli_real_escape_string($db, $_POST["title"]) : null;
    $price = isset($_POST["price"]) ? mysqli_real_escape_string($db, $_POST["price"]) : null;
    $description = isset($_POST["description"]) ? mysqli_real_escape_string($db, $_POST["description"]) : null;
    $rooms = isset($_POST["rooms"]) ? (int)$_POST["rooms"] : null;
    $wc = isset($_POST["wc"]) ? (int)$_POST["wc"] : null;
    $garage = isset($_POST["garage"]) ? (int)$_POST["garage"] : null;
    $timestamp = isset($_POST["timestamp"]) ? mysqli_real_escape_string($db, $_POST["timestamp"]) : null;
    $id_seller = isset($_POST["id_seller"]) ? (int)$_POST["id_seller"] : null;

    if ($title && $price && $description && $rooms !== null && $wc !== null && $garage !== null && $timestamp && $id_seller) {
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $imageTmpName = $_FILES['image']['tmp_name'];
            $imageName = basename($_FILES['image']['name']);
            $imagePath = 'uploads/' . $imageName;

            if (move_uploaded_file($imageTmpName, $imagePath)) {
                $query = "INSERT INTO properties (title, price, image, description, rooms, wc, garage, timestamp, id_seller) 
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
                $stmt = $db->prepare($query);
                $stmt->bind_param("sdssiiisi", $title, $price, $imagePath, $description, $rooms, $wc, $garage, $timestamp, $id_seller);

                if ($stmt->execute()) {
                    header("Location: " . $_SERVER['PHP_SELF']);
                    exit();
                }
                $stmt->close();
            }
        }
    }
}
?>

<section>
    <h2>Properties form</h2>
    <div>
        <form action="crearpropiedad.php" method="post" enctype="multipart/form-data">
            <fieldset>
                <legend>Fill all the form fields</legend>
                <div>
                    <label for="title">Title</label>
                    <input type="text" id="title" name="title" placeholder="Property Title" required>
                </div>
                <div>
                    <label for="price">Price</label>
                    <input type="number" name="price" id="price" step="0.01" required>
                </div>
                <div>
                    <label for="image">Image</label>
                    <input type="file" accept="image/*" id="image" name="image" required>
                </div>
                <div>
                    <label for="description">Description</label>
                    <textarea name="description" id="description" required></textarea>
                </div>
                <div>
                    <label for="rooms">Rooms</label>
                    <input type="number" name="rooms" id="rooms" min="0" required>
                </div>
                <div>
                    <label for="wc">WC</label>
                    <input type="number" name="wc" id="wc" min="0" required>
                </div>
                <div>
                    <label for="garage">Garage</label>
                    <input type="number" name="garage" id="garage" min="0" required>
                </div>
                <div>
                    <label for="timestamp">TimeStamp</label>
                    <input type="date" name="timestamp" id="timestamp" required>
                </div>
                <div>
                    <label for="id_seller">Seller</label>
                    <select name="id_seller" id="id_seller" required>
                        <?php while ($seller = mysqli_fetch_assoc($sellers)) : ?>
                            <option value="<?php echo $seller['id']; ?>"><?php echo $seller['name']; ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <div>
                    <button type="submit">Create a new property</button>
                </div>
            </fieldset>
        </form>
    </div>
</section>

<?php
include "includes/footer.php";
?>
