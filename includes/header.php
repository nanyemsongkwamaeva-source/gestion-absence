<?php
if (session_status() === PHP_SESSION_NONE) session_start();
$currentPage = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport"
content="width=device-width, initial-scale=1.0">
<title>Gestion des Absences</title>
<link href="assets/css/bootstrap.min.css" rel="stylesheet">
<link href="assets/css/bootstrap-icons.min.css"
rel="stylesheet">
<link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
<div class="d-flex">
<!-- SIDEBAR (menu lateral) -->
<nav class="sidebar bg-dark text-white">
<div class="sidebar-header p-3 border-bottom border-secondary">
<h5 class="mb-0">
<i class="bi bi-calendar-check"></i>
Gestion Absences
</h5>
<small class="text-muted">
<?= htmlspecialchars($_SESSION['user_prenom']
. ' ' . $_SESSION['user_nom']) ?>
</small>
</div>
<ul class="nav flex-column p-2">
<!-- Menu commun a tous -->
<li class="nav-item">
<a href="index.php"
class="nav-link text-white
<?= $currentPage == 'index.php'
? 'active bg-primary rounded' : '' ?>">
<i class="bi bi-speedometer2 me-2"></i>
Tableau de bord
</a>
</li>
<!-- Menus RESPONSABLE ACADEMIQUE -->
<?php if (hasRole('RESPONSABLE_ACADEMIQUE')): ?>
<li class="nav-item mt-2">
<small class="text-muted px-3">PARAMETRAGE</small>
</li>
<li class="nav-item">
<a href="pages/niveaux.php"
class="nav-link text-white
<?= $currentPage == 'niveaux.php'
? 'active bg-primary rounded' : '' ?>">
<i class="bi bi-layers me-2"></i> Niveaux
</a>
</li>
<li class="nav-item">
<a href="pages/semestres.php"
class="nav-link text-white
<?= $currentPage == 'semestres.php'
? 'active bg-primary rounded' : '' ?>">
<i class="bi bi-calendar3 me-2"></i> Semestres
</a>
</li>
<li class="nav-item">
<a href="pages/filieres.php"class="nav-link text-white
<?= $currentPage == 'filieres.php'
? 'active bg-primary rounded' : '' ?>">
<i class="bi bi-diagram-3 me-2"></i> Filieres
</a>
</li>
<li class="nav-item">
<a href="pages/specialites.php"
class="nav-link text-white
<?= $currentPage == 'specialites.php'
? 'active bg-primary rounded' : '' ?>">
<i class="bi bi-bookmark me-2"></i> Specialites
</a>
</li>
<li class="nav-item mt-2">
<small class="text-muted px-3">PEDAGOGIE</small>
</li>
<li class="nav-item">
<a href="pages/modules.php"
class="nav-link text-white
<?= $currentPage == 'modules.php'
? 'active bg-primary rounded' : '' ?>">
<i class="bi bi-book me-2"></i> Modules
</a>
</li>
<li class="nav-item">
<a href="pages/cours.php"
class="nav-link text-white
<?= $currentPage == 'cours.php'
? 'active bg-primary rounded' : '' ?>">
<i class="bi bi-journal-text me-2"></i> Cours
</a>
</li>
<li class="nav-item">
<a href="pages/enseignants.php"
class="nav-link text-white
<?= $currentPage == 'enseignants.php'
? 'active bg-primary rounded' : '' ?>">
<i class="bi bi-person-badge me-2"></i>
Enseignants
</a>
</li>
<li class="nav-item">
<a href="pages/etudiants.php"
class="nav-link text-white
<?= $currentPage == 'etudiants.php'
? 'active bg-primary rounded' : '' ?>">
<i class="bi bi-mortarboard me-2"></i>
Etudiants
</a>
</li>
<li class="nav-item">
<a href="pages/inscriptions.php"
class="nav-link text-white
<?= $currentPage == 'inscriptions.php'
? 'active bg-primary rounded' : '' ?>">
<i class="bi bi-pencil-square me-2"></i>
Inscriptions
</a>
</li>
<li class="nav-item mt-2">
<small class="text-muted px-3">PLANNING</small>
</li>
<li class="nav-item">
<a href="pages/salles.php"
class="nav-link text-white
<?= $currentPage == 'salles.php'
? 'active bg-primary rounded' : '' ?>">
<i class="bi bi-building me-2"></i> Salles
</a>
</li>
<li class="nav-item">
<a href="pages/seances.php"
class="nav-link text-white
<?= $currentPage == 'seances.php'
? 'active bg-primary rounded' : '' ?>">
<i class="bi bi-clock me-2"></i> Seances
</a>
</li>
<?php endif; ?>
<!-- Menu CHARGE DE DISCIPLINE -->
<?php if (hasRole('CHARGE_DISCIPLINE')): ?>
<li class="nav-item mt-2">
<small class="text-muted px-3">DISCIPLINE</small>
</li>
<li class="nav-item">
<a href="pages/pointage.php"
class="nav-link text-white
<?= $currentPage == 'pointage.php'
? 'active bg-primary rounded' : '' ?>">
<i class="bi bi-check2-square me-2"></i>
Pointage
</a>
</li>
<?php endif; ?>
<!-- Menus DIRECTEUR -->
<?php if (hasRole('DIRECTEUR')): ?>
<li class="nav-item mt-2">
<small class="text-muted px-3">DIRECTION</small>
</li>
<li class="nav-item">
<a href="pages/statistiques.php"
class="nav-link text-white
<?= $currentPage == 'statistiques.php'
? 'active bg-primary rounded' : '' ?>">
<i class="bi bi-bar-chart me-2"></i>
Statistiques
</a>
</li>
<li class="nav-item">
<a href="pages/utilisateurs.php"
class="nav-link text-white
<?= $currentPage == 'utilisateurs.php'
? 'active bg-primary rounded' : '' ?>">
<i class="bi bi-people me-2"></i>
Utilisateurs
</a>
</li>
<?php endif; ?>
</ul>
<!-- Bouton deconnexion en bas -->
<div class="mt-auto p-3 border-top border-secondary">
<a href="logout.php"
class="btn btn-outline-light btn-sm w-100">
<i class="bi bi-box-arrow-right me-2"></i>
Deconnexion
</a>
</div>
</nav>
<!-- CONTENU PRINCIPAL -->
<main class="content-area flex-grow-1 p-4">