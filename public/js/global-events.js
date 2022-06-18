// livewire events

Livewire.on("toast", (type, message, heading) => {
    makeToastr(type, message , heading)
});
