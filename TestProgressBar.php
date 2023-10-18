<!-- <div id="progress">
  <div id="progress-bar" role="progressbar"  aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
</div> -->


<div id="progress-bar">


    <?php
    $GetProgressBarDataQuery = "SELECT `progress` FROM `user_workout` WHERE `username` = '$user_name' AND `status`= 'pending'";
    $RunGetProgressDataQuery = mysqli_query($conn, $GetProgressBarDataQuery);
    if (isset($RunGetProgressDataQuery)) {
        while ($progressData = mysqli_fetch_array($RunGetProgressDataQuery)) {

            ?>


            <div id="progress" style="width: <?php echo $progressData['progress'] . "%" ?>"></div>


            <?php
        }
    } else {
        ?>
        <div id="progress" style="width: 0%"></div>
        <?php
    }
    ?>

</div>