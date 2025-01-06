<?php
session_start();
include "db.php";

$q = "select * from `msg` as m join `users` as u on u.phone = m.phone ";
// $q = "select * from `msg`  ";
if ($rq = mysqli_query($db, $q)) {
    if (mysqli_num_rows($rq) > 1) {
        while ($data = mysqli_fetch_assoc($rq)) {
            if ($data['phone'] === $_SESSION['phone']) {
?>
                <p class="sender">
                    <span><?= $data['uname'] ?></span>
                    <?= $data['msg'] ?>
                </p>

            <?php
            } else {
            ?>
                <p>
                    <span><?= $data['uname'] ?></span>
                    <?= $data['msg'] ?>
                </p>

<?php
            }
        }
    } else {
        echo "Chat is empty at this moment";
    }
}
?>