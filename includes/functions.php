<?php
// DATABASE FUNCTION
function pdo(PDO $pdo, string $sql, array $arguments = null)
{
    if (!$arguments) {                   
        return $pdo->query($sql);        
    }
    $statement = $pdo->prepare($sql);    
    $statement->execute($arguments);     
    return $statement;                  
}

// FORMATTING FUNCTIONS
function html_escape($text): string
{
    
    $text = $text ?? ''; 

    return htmlspecialchars($text, ENT_QUOTES, 'UTF-8', false); 
}

