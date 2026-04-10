<?php
require_once 'includes/auth.php';
requireLogin();
$pdo = getConnection();
 
// Statistiques selon le role
$totalEtudiants = $pdo->query(
    "SELECT COUNT(*) FROM etudiant")->fetchColumn();
$totalEnseignants = $pdo->query(
    "SELECT COUNT(*) FROM enseignant")->fetchColumn();
$totalSeances = $pdo->query(
    "SELECT COUNT(*) FROM seance")->fetchColumn();
$totalAbsences = $pdo->query(
    "SELECT COUNT(*) FROM pointage
     WHERE statut = 'Absent'")->fetchColumn();
 
include 'includes/header.php';
?>
 
<h2 class="mb-4">Tableau de bord</h2>
 
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="stat-card blue">
            <div class="stat-value"><?= $totalEtudiants ?></div>
            <div>Etudiants</div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="stat-card green">
            <div class="stat-value"><?= $totalEnseignants ?></div>
            <div>Enseignants</div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="stat-card amber">
            <div class="stat-value"><?= $totalSeances ?></div>
            <div>Seances</div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="stat-card red">
            <div class="stat-value"><?= $totalAbsences ?></div>
            <div>Absences</div>
        </div>
    </div>
</div>
 
<?php include 'includes/footer.php'; ?>
