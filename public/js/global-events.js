// livewire events

Livewire.on("toast", (type, message, heading) => {
    makeToastr(type, message, heading)
});

// global browser events

window.addEventListener('hideModal', () => {
    $(".modal").modal('hide');
})
