<?php
require_once 'includes/auth.php';
// Si deja connecte, rediriger vers l'accueil
if (isLoggedIn()) {
header('Location: index.php');
exit;
}
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$login = trim($_POST['login'] ?? '');
$password = $_POST['password'] ?? '';
if (empty($login) || empty($password)) {
$error = 'Veuillez remplir tous les champs.';
} elseif (loginUser($login, $password)) {
header('Location: index.php');
exit;
} else {
$error = 'Identifiants incorrects.';
}
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport"
content="width=device-width, initial-scale=1.0">
<title>Connexion - Gestion des Absences</title>
<link href="assets/css/bootstrap.min.css" rel="stylesheet">
<link href="assets/css/style.css" rel="stylesheet">
</head>
<body class="login-page">
<div class="login-card">
<div class="login-header">
<h2>Gestion des Absences</h2>
<p>Connectez-vous pour continuer</p>
</div>
<div class="login-body">
<?php if ($error): ?>
<div class="alert alert-danger">
<?= htmlspecialchars($error) ?>
</div>
<?php endif; ?>
<form method="POST">
<div class="mb-3">
<label class="form-label">Login</label>
<input type="text" class="form-control"
name="login" required
value="<?= htmlspecialchars($login ?? '') ?>">
</div>
<div class="mb-3">
<label class="form-label">Mot de passe</label>
<input type="password" class="form-control"
name="password" required>
</div>
<button type="submit"
class="btn btn-primary w-100">
Se connecter
</button>
</form>
</div>
</div>
<script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>