<?php
$link = new PDO('mysql:host=localhost;dbname=users_info', 'root', '');
$sql = ("SELECT id FROM migrations ORDER BY id DESC LIMIT 1");
$query = $link->prepare($sql);
$query->execute();
$lastId = $query->fetch()['id'];
$curentId = $lastId+1;

while (file_exists("migrations/$curentId.migration.sql")){
    $handle = @fopen("migrations/$curentId.migration.sql", "r");
    if ($handle) {
        while (($buffer = fgets($handle, 4096)) !== false) {
            $sql = ("$buffer");
            $query = $link->prepare($sql);
            if($query->execute()){
                echo "migration success";
            }else {
                echo $curentId. "migration is not success";
            }
        }
        fclose($handle);
        $sql = ("INSERT INTO migrations (migration) VALUE (:migration)");
        $query = $link->prepare($sql);
        $query->execute([
            ':migration' => "$curentId.migration.sql"
        ]);


    }
    $curentId+=1;
}


?>