<?php
include "db.php";
include "header.php";
session_start();
if (isset($_SESSION["userName"]) && isset($_SESSION["phone"])) {
?>

    <body>
        <h1>ChatRoom</h1>
        <div class="chat">
            <h2>Welcome <span><?php echo $_SESSION["userName"] ?></span> <a href="./logout.php"><button class="logoutBtn">Logout</button></a></h2>

            <div class="msg">
            </div>
            <div class="input_msg">
                <input type="text" placeholder="Write msg Here" id="input_msg" name="input_msg">
                <button onclick="update()">Send</button>
            </div>
        </div>
    </body>
    <script src="js/script.js"></script>

    </html>

<?php
} else {
    header("location:login.php");
}
?>