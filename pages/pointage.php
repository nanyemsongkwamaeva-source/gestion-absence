<form method="POST">
    <input type="hidden" name="action" value="pointer">
    <input type="hidden" name="id_seance"
           value="<?= $seance['id_seance'] ?>">
 
    <table class="table table-custom">
        <thead>
            <tr>
                <th>Matricule</th>
                <th>Nom et prenom</th>
                <th>Present</th>
                <th>Absent</th>
                <th>Retard</th>
                <th>Observation</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($etudiants as $etu): ?>
            <tr>
                <td><?= htmlspecialchars($etu['matricule']) ?></td>
                <td><?= htmlspecialchars(
                    $etu['nom'] . ' ' . $etu['prenom']) ?></td>
                <td>
                    <input type="radio"
                        name="statut[<?= $etu['id_etudiant'] ?>]"
                        value="Present"
                        <?= ($etu['statut'] ?? '') === 'Present'
                            ? 'checked' : '' ?>>
                </td>
                <td>
                    <input type="radio"
                        name="statut[<?= $etu['id_etudiant'] ?>]"
                        value="Absent" checked>
                </td>
                <td>
                    <input type="radio"
                        name="statut[<?= $etu['id_etudiant'] ?>]"
                        value="Retard"
                        <?= ($etu['statut'] ?? '') === 'Retard'
                            ? 'checked' : '' ?>>
                </td>
                <td>
                    <input type="text" class="form-control form-control-sm"
                        name="observation[<?= $etu['id_etudiant'] ?>]"
                        value="<?= htmlspecialchars(
                            $etu['observation'] ?? '') ?>">
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
 
    <button type="submit" class="btn btn-primary">
        <i class="bi bi-check2-all me-1"></i>
        Enregistrer le pointage
    </button>
</form>
