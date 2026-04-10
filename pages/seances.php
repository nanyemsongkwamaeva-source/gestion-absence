<!-- Dans le modal d'ajout de seance -->
<form method="POST">
    <input type="hidden" name="action" value="creer">
    <div class="row">
        <div class="col-md-4 mb-3">
            <label class="form-label">Date</label>
            <input type="date" class="form-control"
                   name="date_seance" required>
        </div>
        <div class="col-md-4 mb-3">
            <label class="form-label">Heure debut</label>
            <input type="time" class="form-control"
                   name="heure_debut" required>
        </div>
        <div class="col-md-4 mb-3">
            <label class="form-label">Heure fin</label>
            <input type="time" class="form-control"
                   name="heure_fin" required>
        </div>
    </div>
    <div class="mb-3">
        <label class="form-label">Cours</label>
        <select class="form-select" name="id_cours" required>
            <option value="">-- Choisir un cours --</option>
            <?php foreach ($cours as $c): ?>
                <option value="<?= $c['id_cours'] ?>">
                    <?= htmlspecialchars($c['intitule_cours']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label">Salle</label>
        <select class="form-select" name="id_salle" required>
            <option value="">-- Choisir une salle --</option>
            <?php foreach ($salles as $s): ?>
                <option value="<?= $s['id_salle'] ?>">
                    <?= htmlspecialchars($s['nom_salle']
                        . ' (' . $s['capacite'] . ' places)') ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <!-- Meme principe pour enseignant, semestre, annee -->
    <button type="submit" class="btn btn-primary">
        Programmer</button>
</form>
