@forelse ($planners as $planner)
    <div class="plan-item">
        <input type="checkbox" class="task-checkbox" data-id="{{ $planner->id }}"
            {{ $planner->is_done ? 'checked' : '' }}>
        <span class="task-name">{{ $planner->activity }}</span>
        <div class="task-actions">
            <button type="button" {{-- <-- Penting agar tidak dianggap submit --}} class="btn-edit" style="background: transparent; border: none;"
                data-bs-toggle="modal" data-bs-target="#editModal" data-id="{{ $planner->id }}"
                data-activity="{{ $planner->activity }}" data-date="{{ $planner->scheduled_at }}">
                <img src="{{ asset('images/icons/edit.png') }}" alt="Edit">
            </button>

            <button type="button" class="btn-hapus" style="background: transparent; border: none;"
                data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="{{ $planner->id }}">
                <img src="{{ asset('images/icons/delete.png') }}" alt="Delete">
            </button>

        </div>
        <div class="task-date">
            <img src="{{ asset('images/icons/help.png') }}" alt="Time">
            <span>{{ \Carbon\Carbon::parse($planner->scheduled_at)->translatedFormat('d M Y') }}</span>
        </div>
    </div>
@empty
    <p style="text-align:center; color:gray;">Belum ada jadwal</p>
@endforelse
<!-- Modal Edit -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="editForm" method="POST">
            @csrf
            <div class="modal-content" style="border-radius: 16px; overflow: hidden;">
                <div class="modal-header" style="background-color: #f7cfc1; border-bottom: none;">
                    <h5 class="modal-title" id="editModalLabel" style="color: #7d4b44; font-weight: bold;">
                        Edit Planner
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="background-color: #fff4f6;">
                    <input type="text" id="editActivity" name="activity" class="form-control mb-3"
                        placeholder="Edit activity..." required>
                    <input type="date" id="editDate" name="scheduled_at" class="form-control" required>
                </div>
                <div class="modal-footer" style="background-color: #fff4f6; border-top: none;">
                    <button type="button" class="btn" data-bs-dismiss="modal"
                        style="background-color: #7d4b44; color: white;">
                        Batal
                    </button>
                    <button type="submit" class="btn" style="background-color: #f85ca7; color: white;">
                        Simpan Perubahan
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>


<!-- Modal Delete -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="deleteForm" method="POST">
            @csrf
            @method('DELETE')
            <div class="modal-content" style="border-radius: 16px; overflow: hidden;">
                <div class="modal-header" style="background-color: #f7cfc1; border-bottom: none;">
                    <h5 class="modal-title" id="deleteModalLabel" style="color: #7d4b44; font-weight: bold;">
                        Konfirmasi Hapus
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body" style="background-color: #fff4f6; color: #7d4b44;">
                    Apakah kamu yakin ingin menghapus kegiatan ini?
                </div>
                <div class="modal-footer" style="background-color: #fff4f6; border-top: none;">
                    <button type="button" class="btn" data-bs-dismiss="modal"
                        style="background-color: #7d4b44; color: white;">
                        Batal
                    </button>
                    <button type="submit" class="btn" style="background-color: #f85ca7; color: white;">
                        Hapus
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const checkboxes = document.querySelectorAll('.task-checkbox');

        checkboxes.forEach(function (checkbox) {
            checkbox.addEventListener('change', function () {
                const plannerId = this.dataset.id;
                const isDone = this.checked ? 1 : 0;

                fetch(`/beauty-planner/${plannerId}/done`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ is_done: isDone })
                })
                .then(response => {
                    if (!response.ok) throw new Error('Gagal mengubah status.');
                    return response.json();
                })
                .then(data => {
                    console.log(data.message); // Berhasil ubah
                })
                .catch(error => {
                    alert('Terjadi kesalahan saat mengubah status.');
                    console.error(error);
                });
            });
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Untuk Modal Edit
        const editModal = document.getElementById('editModal');
        editModal.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;
            const id = button.getAttribute('data-id');
            const activity = button.getAttribute('data-activity');
            const date = button.getAttribute('data-date');

            document.getElementById('editActivity').value = activity;
            document.getElementById('editDate').value = date;
            document.getElementById('editForm').action = `/beauty-planners/${id}`;
        });

        // Untuk Modal Hapus
        const deleteModal = document.getElementById('deleteModal');
        deleteModal.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;
            const id = button.getAttribute('data-id');
            document.getElementById('deleteForm').action = `/beauty-planners/${id}`;
        });
    });
</script>
