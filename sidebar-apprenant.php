<?php 
include('connexion.php');
$user_id = null;
// Vérifier si une session est active
if (session_status() == PHP_SESSION_ACTIVE) {
    // Récupérer l'ID de l'utilisateur à partir de la variable de session
    $user_id = $_SESSION['id'];
}

?>
 <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion mr-2" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">MON ECOLE</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <!--  -->
                <a class="nav-link" href="apprenant.php?id=<?php echo base64_encode($user_id); ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Accueil</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>


            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="cours-apprenants.php?id=<?php echo base64_encode($user_id); ?>">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Mes cours</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

        </ul>
        <!-- End of Sidebar -->