<div id="main-menu" class="main-nav zn_mega_wrapper ">
  <ul id="menu-main-menu" class="main-menu zn_mega_menu">
    <li><a href="index2.php">Home</a></li>
    <?
    $alias = $_GET['alias'];
    //Haal alle categorieen en check gelijk of de desbetreffende categorie artikelen onder zich heeft hangen.
    $menu = "
    SELECT cat.id as cat_id, cat.level, cat.parent_id, cat.title as cat_title, cat.alias as cat_alias, cat.published, cat.rgt, cnt.state, cnt.id as content_id, cnt.catid, cnt.title as content_title, cnt.alias as content_alias
    FROM snm_categories cat
    LEFT JOIN snm_content cnt
    ON cnt.catid = cat.id
    WHERE cat.id NOT IN (1, 2, 3, 4, 5, 7, 16, 18)
    AND cat.published = 1
    AND cat.level = 1
    GROUP BY cat.id
    ORDER BY cat.rgt ASC";
    $menuconn = $conn->query($menu);
    //Loop het resultaat
    while($menu = $menuconn->fetch_assoc()){
      $cat_ids = '';
      $subcatmenulijst = '';
      $subcats = '';
      //Code om te checken of de huidige pagina gelijk is aan de alias
      if($menu['alias'] == $alias){
        $class='current';
      } else {
        $class = '';
      }

      //Stop alle ids van de categorieen in een array
      $cat_ids[] = $menu['cat_id'];

      //Implodeer ze met commas ertussen zodat ze bruikbaar zijn in een query
      if(!empty($cat_ids)) {
        $useableids = implode(',', $cat_ids);
      }
      // Query voor de subcats
      $subcatmenu         = 'SELECT * FROM snm_categories WHERE parent_id IN ('.$conn->real_escape_string($useableids).') and published = 1 ORDER BY lft';
      $subcatmenucon      = $conn->query($subcatmenu);
      while($subcatmenu   = $subcatmenucon->fetch_assoc()){
        $subcatmenulijst .= '<li><a href="info/'.$subcatmenu['alias'].'.html">'.$subcatmenu['title'].'</a></li>';
      }
      // Als
      if(!empty($subcatmenulijst)){
        $subcats = 'true';
      }

      //Loop alle categorieen
      $menuresult .= '<li class="'.$class.'"><a href="info/'.$menu['cat_alias'].'.html">'.$menu['cat_title'].'</a>';
      //Haal alle artikelen op waar het catid gelijk is aan het id van een categorie (binnen bovenstaande loop, zodat het gebeurd voor elke categorie)
      $submenu = "SELECT * FROM snm_content WHERE catid = '".$conn->real_escape_string($menu['cat_id'])."' AND state = 1 ORDER BY ordering";
      $submenuconn = $conn->query($submenu);

      //Als er het id van een artikel niet leeg is (dus als er artikelen onder hangen) OF als er subcategorieeen aanwezig zijn:
      if(!empty($menu['content_id']) OR $subcats == 'true'){
        $menuresult .= '<ul class="sub-menu">';
        //Loop het resultaat
        while($submenu = $submenuconn->fetch_assoc()){
          $menuresult .= '<li><a href="'.$submenu['alias'].'.html">'.$submenu['title'].'</a></li>';
        }
        // Plak de categorieen onder artikelen
        $menuresult .= $subcatmenulijst;
        $menuresult .= '</ul>';
      }
      $menuresult .= '</li>';
    }
    echo $menuresult;
    ?>
    <li><a href="contact.php">Contact</a></li>
  </ul>
</div>
