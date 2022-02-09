<?php

$x = json_decode(file_get_contents("https://data.gov.lv/dati/lv/api/3/action/datastore_search?resource_id=d499d2f0-b1ea-4ba2-9600-2c701b03bd4a&limit=1000"), true);



$time= $_POST["post"];

$start = "";
$end = "";


$date = date_default_timezone_set("Europe/Latvia");
$currentTime = date("Y-m-d");
$timeMinus3Years = explode("-", $currentTime);

if (isset($_POST['dateStart']) || isset($_POST['dateEnd'])) {
    $start = $_POST['dateStart'];
    $end = $_POST['dateEnd'];
}


$listInBetween = [];

foreach ($x["result"]["records"] as $newList) {
    $check = str_replace("-", "", explode("T", $newList["Datums"])[0]);
    if ($check >= str_replace("-", "", $start) && $check <= str_replace("-", "", $end)) {
        $listInBetween[] = $newList;
    }
}

?>


<form method="post">
    <label for="start"></label><input type="date" id="start" name="dateStart" value=<?php echo $start?>  min="2018-01-01" max=<?php echo $currentTime?>>
    <label for="end"></label> <input type="date" id="end" name="dateEnd" value=<?php echo $end?> min="2018-01-01" max=<?php echo $currentTime?>>
    <input type="submit">
</form>




<table  border="1" cellpadding="5" bgcolor="#fffaf0">
    <thead>
    <tr>

        <th> Date </th>
          <th>Total Test Cases</th>
           <th> Confirmed Cases </th>
              <th> Percentage of Positive Tests </th>

    </thead>

    <?php $counter = 0; foreach ($listInBetween as $index => $see):?>
        <?php if($counter % 2 == 0):?>
            <td bgcolor="#fafad2"><?php echo explode("T", $see["Datums"])[0] ?></td>
            <td bgcolor="#fafad2"><?php echo $see["TestuSkaits"]?></td>
            <td bgcolor="#fafad2"><?php echo $see["ApstiprinataCOVID19InfekcijaSkaits"]?></td>
            <?php if(($see["ApstiprinataCOVID19InfekcijaSkaits"] / $see["TestuSkaits"] * 100) > 10):?>
                <td bgcolor="#ed4c4c"><?php echo round( $see["ApstiprinataCOVID19InfekcijaSkaits"] / $see["TestuSkaits"] * 100, 2) . " %"?></td>
            <?php else:?>
                <td bgcolor="#fafad2"><?php echo round( $see["ApstiprinataCOVID19InfekcijaSkaits"] / $see["TestuSkaits"] * 100, 2) . " %"?></td>
            <?php endif ?>
        </tr>

    <?php else:?>
    <td bgcolor="#d3d3d3"><?php echo explode("T", $see["Datums"])[0] ?></td>
    <td bgcolor="#d3d3d3"><?php echo $see["TestuSkaits"]?></td>
    <td bgcolor="#d3d3d3"><?php echo $see["ApstiprinataCOVID19InfekcijaSkaits"]?></td>
    <?php if(($see["ApstiprinataCOVID19InfekcijaSkaits"] / $see["TestuSkaits"] * 100) > 10):?>
               <td bgcolor="#ed4c4c"><?php echo round( $see["ApstiprinataCOVID19InfekcijaSkaits"] / $see["TestuSkaits"] * 100, 2) . " %"?></td>
                <?php else:?>
                 <td bgcolor="#d3d3d3"><?php echo round( $see["ApstiprinataCOVID19InfekcijaSkaits"] / $see["TestuSkaits"] * 100, 2) . " %"?></td>
        <?php endif ?>

            </tr>
    <?php endif ?>

    <?php
    $counter += 1;
    endforeach ?>

</table>

