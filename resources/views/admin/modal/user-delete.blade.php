<div class="modal fade" id="delete{{ $user->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Удаление</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Вы действительно хотите удалить пользователя <b>{{ $user->name }}</b>?
            </div>
            <div class="modal-footer">
                <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger">Удалить</button>
                </form>
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Назад</button>
            </div>
        </div>
    </div>
</div>
