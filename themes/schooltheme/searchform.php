<form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
    <input type="text" value="<?php the_search_query(); ?>" name="s" id="s" class="searchfield" placeholder="Search" />
    <input type="submit" id="searchsubmit" value="search" class="searchbutton" />
</form>