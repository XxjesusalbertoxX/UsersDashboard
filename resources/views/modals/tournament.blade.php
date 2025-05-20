<div class="modal fade" id="tournamentModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tournamentModalLabel">Torneo</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body" id="tournamentModalBody">
        <!-- Aquí irán los datos cargados por AJAX -->
      </div>
    </div>
  </div>
</div>

<script>
function openTournamentModal(torneoId) {
    fetch(`/tournaments/${torneoId}`)
        .then(response => response.json())
        .then(data => {
            document.getElementById('tournamentModalLabel').textContent = data.name;
            document.getElementById('tournamentModalBody').innerHTML = `
                <p><strong>Descripción:</strong> ${data.description}</p>
                <p><strong>Fecha:</strong> ${data.start_date} a ${data.end_date}</p>
                <p><strong>Lugar:</strong> ${data.location ?? 'TBD'}</p>
            `;
            const modal = new bootstrap.Modal(document.getElementById('tournamentModal'));
            modal.show();
        })
        .catch(error => {
            console.error('Error al cargar el torneo:', error);
        });
}
</script>
