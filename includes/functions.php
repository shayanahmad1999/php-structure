<?php
function sanitize($data) {
    return htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
}
function url($route, $id = null) {
    $url = $route;
    if ($id !== null) {
        $url .= '/' . $id;
    }
    return $url;
}
function title($pageTitle = "Home", $baseTitle = "PHP SIMPLE STRUCTURE | ") {
    return $baseTitle . $pageTitle;
}

?>
