<?php
include 'data_connection/database.php';

?>
<aside id="sidebar" class="side">
    <div class="h-50">
        <div class="sidebar_logo d-flex align-items-end">
            <img src="img/logo.svg" alt="icon">
            <a href="../index.php" class="nav-link text-white-50">Dashboard</a>
            <a href="../index.php"><img class="close align-self-start" src="img/close.svg" alt="icon"></a>
        </div>
<?php if ( $_SESSION['role']== 'Admin'): ?>
    <ul class="sidebar_nav">
    <!-- <li class="sidebar_item <?=$dashboard_active?>" style="width: 100%;">
        <a href="dashboard.php" class="sidebar_link"> <img src="img/1. overview.svg" alt="icon">statistics</a>
    </li> -->
    <li class="sidebar_item <?=$users_active?>" style="width: 100%;">
        <a href="users.php" class="sidebar_link"> <img src="img/agents.svg" alt="icon">users</a>
    </li>
    <li class="sidebar_item <?=$projects_active?>">
        <a href="Projects.php" class="sidebar_link"> <img src="img/task.svg" alt="icon">Projects</a>
    </li>

    <li class="sidebar_item <?=$categorys_active?>">
        <a href="Categorys.php" class="sidebar_link"><img src="img/agent.svg" alt="icon">Categorys</a>
    </li>

    <li class="sidebar_item <?=$Testimonial_active?>">
        <a href="testimonial.php" class="sidebar_link"><img src="img/agent.svg" alt="icon">Testimonial</a>
    </li>
</ul> 
<?php endif;  
 if ( $_SESSION['role'] == 'Freelancer'): ?>
    <ul class="sidebar_nav">
    <!-- <li class="sidebar_item <?=$dashboard_active?>" style="width: 100%;">
        <a href="dashboard.php" class="sidebar_link"> <img src="img/1. overview.svg" alt="icon">statistics</a>
    </li> -->
    <li class="sidebar_item <?=$projects_active?>">
        <a href="Projects.php" class="sidebar_link"> <img src="img/task.svg" alt="icon">Projects</a>
    </li>
    <li class="sidebar_item <?=$categorys_active?>">
        <a href="offers.php" class="sidebar_link"><img src="img/agent.svg" alt="icon">offers</a>
    </li>
    <li class="sidebar_item <?=$Testimonial_active?>">
        <a href="testimonial.php" class="sidebar_link"><img src="img/agent.svg" alt="icon">Testimonial</a>
    </li>
</ul> 
<?php endif; 
if ( $_SESSION['role'] == 'Client'): ?>
    <ul class="sidebar_nav">
    <li class="sidebar_item <?=$projects_active?>">
        <a href="Projects.php" class="sidebar_link"> <img src="img/task.svg" alt="icon">Projects</a>
    </li>
    <li class="sidebar_item <?=$categorys_active?>">
        <a href="offers.php" class="sidebar_link"><img src="img/agent.svg" alt="icon">offers</a>
    </li>
    <li class="sidebar_item <?=$Testimonial_active?>">
        <a href="testimonial.php" class="sidebar_link"><img src="img/agent.svg" alt="icon">Testimonial</a>
    </li>
</ul> 
<?php endif; ?>
    </div>
</aside>