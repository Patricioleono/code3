
window.addEventListener('DOMContentLoaded', event => {

    //cerrar sidebar con btn
    const sidebarToggle = document.body.querySelector('#sidebarToggle');
    const sidebarToggle2 = document.body.querySelector('#sidebarToggle2');

    let triggerButton = (trigger) => {
        if (trigger) {
            if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
                document.body.classList.toggle('sb-sidenav-toggled');
            }
            trigger.addEventListener('click', event => {
                event.preventDefault();
                document.body.classList.toggle('sb-sidenav-toggled');
                localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
            });
        }
    }
    triggerButton(sidebarToggle);
    triggerButton(sidebarToggle2);


});