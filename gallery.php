<!doctype html>

<html>

<head>

</head>

<body>
    


<section id="gallery">
<?php 

$access_token="EAADJpDdCnqoBAJiJCXG4jIoQrpKQX2gskJd608RkwzPJYhK9ObEkHFGaKkTd51xD2zk8ZCVqiBm1EBbiNZC0FpZAG82UuMVE0sKgBO7mzic6bLHoahp336wQAgQAGHubPSPjHnGR6ONZBMyzng6oxSDZBro3wVm3VPlMrqZCE4gAZDZD";
    $json_link = "https://graph.facebook.com/v2.3/161360967364906/photos?fields=images,name,link&limit=9&access_token={$access_token}";
    $json = file_get_contents($json_link);
    $result = json_decode($json);
    $j = 0;
    foreach($result->data as $image) {
        // Look for third image (instead of large version)
        for($i = 2; $i > 0; $i--) {
            if(isset($image->images[$i])) {
                $name = (isset($image->name) ? $image->name : "");
                echo "<a class=\"photo$j\" href=\"{$image->link}\" title=\"{$name}\" rel=\"external\" style=\"background-image: url('{$image->images[$i]->source}')\"></a>";
                break;
            }
        }
        if($j % 3 == 2) {
            echo "<br />";
        }
        $j++;
    }
?>
</section>

</body>

</html>