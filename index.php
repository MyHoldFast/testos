<?php
header('Content-Type: application/json');
if(substr($_SERVER['QUERY_STRING'], 0, 7) == 'http://' || substr($_SERVER['QUERY_STRING'], 0, 8) == 'https://'){
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $query = "";
        foreach ($_POST as $key) {
            $query .= str_replace(' ', '+', $key);
        }
        
        if($query == "") $query = "";
        $context = stream_context_create(array(
        'http' => array(
            'method' => 'POST',
            'content' => $query
        ),
    )); 
    
    //echo '{$query}';
    
        echo file_get_contents($_SERVER['QUERY_STRING'], false, $context);    
        } else {
             echo file_get_contents($_SERVER['QUERY_STRING']);    
        }
    
}
?>