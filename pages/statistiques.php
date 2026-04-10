<?php
require_once '../includes/auth.php';
requireRole('DIRECTEUR');
$pdo = getConnection();
 
// Donnees pour le graphique : absences par specialite
$stats = $pdo->query("
    SELECT s.nom_specialite,
           COUNT(p.id_pointage) AS total,
           SUM(CASE WHEN p.statut = 'Absent'
               THEN 1 ELSE 0 END) AS absences
    FROM specialite s
    JOIN module m ON s.id_specialite = m.id_specialite
    JOIN cours c ON c.id_module = m.id_module
    JOIN seance se ON se.id_cours = c.id_cours
    JOIN pointage p ON p.id_seance = se.id_seance
    GROUP BY s.nom_specialite
")->fetchAll();
 
include '../includes/header.php';
?>
 
<h2 class="mb-4">Statistiques des absences</h2>
 
<div class="content-card">
    <canvas id="chartAbsences" height="300"></canvas>
</div>
 
<script src="../assets/js/chart.min.js"></script>
<script>
const stats = <?= json_encode($stats) ?>;
new Chart(document.getElementById('chartAbsences'), {
    type: 'bar',
    data: {
        labels: stats.map(s => s.nom_specialite),
        datasets: [{
            label: 'Absences',
            data: stats.map(s => s.absences),
            backgroundColor: '#dc2626'
        }, {
            label: 'Total pointages',
            data: stats.map(s => s.total),
            backgroundColor: '#1a56db'
        }]
    },
    options: {
        responsive: true,
        plugins: { legend: { position: 'top' } }
    }
});
</script>
 
<?php include '../includes/footer.php'; ?>
