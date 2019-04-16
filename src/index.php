<?php

try {
    $db = new PDO("mysql:host=localhost;dbname=adminlte;charset=utf8", "root", "");
} catch ( PDOException $e ){
    print $e->getMessage();
}

function createMainMenu($parent_id = 0) {
    global $db;
    $menuHTML = '';
    $query = $db->prepare("SELECT * FROM sys_menu WHERE upper_menu_id = ? ORDER BY menu_order");
    $query->execute([$parent_id]);
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as $r) {
        $hasChild = $db->query("SELECT id FROM sys_menu WHERE upper_menu_id = " . $r['id']);
        if ( $hasChild->rowCount() ) {
            $menuHTML .= '<li class="treeview"><a href="' . $r['menu_url'] . '"><i class="' . 
                $r['menu_icon'] . '"></i> <span>' . $r['menu_text'] . '</span><span class="' . 
                'pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>' . 
                '</a><ul class="treeview-menu">' . createMainMenu($r['id']) . '</ul>';
        } else {
            $menuHTML .= '<li><a href="' . $r['menu_url'] . '"><i class="' . 
                $r['menu_icon'] . '"></i> <span>' . $r['menu_text'] . 
                '</span></a></li>';
        }
        
    }
    return $menuHTML;
}

//usage

echo createMainMenu();

?>
