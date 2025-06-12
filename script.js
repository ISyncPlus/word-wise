const initApp = () => {
    const contact_btn = document.getElementById('contact-btn');
    const navbar__contact = document.getElementById('navbar__contact');
    const cancel = document.getElementById('cancel');
    const modal = document.getElementById('contact');
    const hamburger = document.getElementById('hamburger');
    const close_ham = document.getElementById('close_ham');
    const sidebar = document.getElementById('sidebar');

    const sideToggle = () => {
        sidebar.classList.toggle('invisible--modifier');
        sidebar.classList.toggle('sidebar');
    }

    const hamToggle = () => {
        hamburger.classList.toggle('visible--modifier');
        hamburger.classList.toggle('invisible--modifier');
        close_ham.classList.toggle('visible--modifier');
        close_ham.classList.toggle('invisible--modifier');
    }

     const modalToggle = () => {
        modal.classList.toggle('hidden');
        modal.classList.toggle('show');
    }

    cancel.addEventListener('click', modalToggle);
    contact_btn.addEventListener('click', modalToggle);
    navbar__contact.addEventListener('click', modalToggle);
    hamburger.addEventListener('click', sideToggle);
    hamburger.addEventListener('click', hamToggle);
    close_ham.addEventListener('click', hamToggle);
    close_ham.addEventListener('click', sideToggle);
    

    // Observer Animation
    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible')
            } else {
                entry.target.classList.remove('visible')
            }
        });
    });

    const hiddenElements = document.querySelectorAll('.invisible');

    hiddenElements.forEach((el) => observer.observe(el));


}
document.addEventListener('DOMContentLoaded', initApp);