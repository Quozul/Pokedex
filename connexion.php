<!DOCTYPE html>
<html>
<?php include('includes/head.php'); ?>

<body>

    <?php include('includes/header.php'); ?>

    <main>
        <?php if (isset($_GET['msg'])) echo "<h2>" . $_GET['msg'] . "</h2>"; ?>
        <div id="log-forms">
            <?php include('includes/sign_up_form.php'); ?>
            <?php include('includes/sign_in_form.php'); ?>
        </div>
    </main>

    <?php include('includes/footer.php'); ?>

</body>

</html>