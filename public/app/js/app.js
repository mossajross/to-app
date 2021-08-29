
const elements = document.querySelectorAll(".fa-trash");
for(let i = 0; i < elements.length ; i++){
    elements[i].addEventListener("click", (e) => {
        e.preventDefault();
        const trash = e.target;
        const taskId = trash.dataset.task;

        const url =  `/delete/task/${taskId}`;
        fetch(url)
            .then(function(data) {
                location.reload();

            })
    })



}