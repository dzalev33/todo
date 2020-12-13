const tasks = document.getElementById('tasks');

if (tasks) {
    tasks.addEventListener('click', e => {
        if (e.target.className === 'btn btn-danger delete-task') {
            if (confirm('Are you sure?')) {
                const id = e.target.getAttribute('data-id');

                fetch(`/task/delete/${id}`, {
                    method: 'DELETE'
                }).then(res => window.location.reload());
            }
        }
    });
}