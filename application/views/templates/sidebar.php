<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?=base_url('admin')?>">
    <div class="sidebar-brand-text mx-3"> TE-08  </div>
</a>

<!-- Divider -->
<hr class="sidebar-divider ">

<!-- Query Menu -->
<?php 
    
    $queryMenu = "SELECT *
                    FROM `user_menu` ";
    
    $menu=$this->db->query($queryMenu)->result_array();
; ?>

<!-- Looping Menu -->
<?php foreach($menu as $m) : ?>
<div class="sidebar-heading pb-0">
    <?=$m['menu']  ; ?>
</div>

<!-- Siapkan submenu sesuai dengan menu -->
<?php 
    $menuId = $m['id'];
    $querySubMenu ="SELECT * 
                        FROM `user_sub_menu` 
                        JOIN `user_menu` 
                        ON `user_sub_menu`.`menu_id`= `user_menu`.`id` 
                        WHERE `user_sub_menu`.`menu_id` = $menuId
                        ";
    $subMenu = $this->db->query($querySubMenu)->result_array();
; ?>

    <?php foreach ($subMenu as $sm) : ?>
    <?php if($title==$sm['title']) : ?>
    <li class="nav-item active">
        <?php else : ?>
    <li class="nav-item ">
        <?php endif ; ?>
        <a class="nav-link pb-0" href="<?=base_url($sm['url'])?>">
            <i class="<?=$sm['icon']?>"></i>
            <span><?=$sm['title']  ; ?></span></a>
</li>
    <?php endforeach ; ?>
<!-- Divider -->
    <hr class="sidebar-divider mt-3">
    
<?php endforeach ; ?>


<!-- Divider -->
<!-- <hr class="sidebar-divider d-none d-md-block"> -->

<li class="nav-item pb-0">
    <a class="nav-link" href="<?=base_url('auth/logout')?>">
    <i class="fas fa-fw fa-sign-out-alt"></i>
        <span>Logout</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->