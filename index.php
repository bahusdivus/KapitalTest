<?php
/**
 * Created by IntelliJ IDEA.
 * User: Dionisii
 * Date: 28.01.2019
 * Time: 22:27
 */
?>

<html>
<head><title></title>
    <style type="text/css">
        img {
            display: block;
            margin: 10px;
        }
    </style>
</head>

<body>

<?php
    $xml = simplexml_load_file("http://api.flickr.com/services/feeds/photos_public.gne?format=rss2");
    $xml = $xml->channel;
    foreach ($xml->children() AS $value) {
        if ($value->getName() == "item") {
            $src = (string) reset(simplexml_import_dom(DOMDocument::loadHTML($value->description))->xpath("//img/@src"));
            echo "<img src='" . str_replace("_m.jpg", "_b.jpg", $src) . "' />";
        }
    }
?>

</body>
</html>
