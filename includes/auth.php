<?php
session_start();
require_once __DIR__ . '/../config/database.php';
// Verifier si l'utilisateur est connecte
function isLoggedIn() {
return isset($_SESSION['user_id']);
}
// Verifier le role de l'utilisateur
function hasRole($role) {
return isset($_SESSION['user_role'])
&& $_SESSION['user_role'] === $role;
}
// Verifier si l'utilisateur a l'un des roles
function hasAnyRole($roles) {
return isset($_SESSION['user_role'])
&& in_array($_SESSION['user_role'], $roles);
}
// Rediriger vers login si non connecte
function requireLogin() {
if (!isLoggedIn()) {
header('Location: login.php');
exit;
}
}
// Exiger un role precis (ou un tableau de roles)
function requireRole($roles) {
requireLogin();
if (!hasAnyRole((array)$roles)) {
header('Location: index.php');
exit;
}
}
// Tenter la connexion
function loginUser($login, $password) {
$pdo = getConnection();
$stmt = $pdo->prepare(
"SELECT * FROM utilisateur
WHERE login = ? AND statut = 'ACTIF'"
);
$stmt->execute([$login]);
$user = $stmt->fetch();
if ($user && $user['mot_de_passe']
=== hash('sha256', $password)) {
$_SESSION['user_id'] = $user['id_utilisateur'];
$_SESSION['user_nom'] = $user['nom'];
$_SESSION['user_prenom'] = $user['prenom'];
$_SESSION['user_role'] = $user['role'];
return true;
}
return false;
}