if(window.innerWidth > 991) {
    window.addEventListener('scroll', function() {
        topDist = window.pageYOffset || (document.documentElement || document.body.parentNode || document.body).scrollTop;
        if(topDist <= 25) {
            let header = document.getElementById('nav');
            header.classList.remove('navigation-scroll');
            header.classList.add('navigation-top');
        } else {
            let header = document.getElementById('nav');
            header.classList.remove('navigation-top');
            header.classList.add('navigation-scroll');
        }
    });
}

function toggleHamburger(x) {
    x.classList.toggle("change");

    let menu = document.getElementById(x.getAttribute('data-target'));
    menu.classList.toggle('navbar_closed');
    menu.classList.toggle('navbar_open');

    if(x.getAttribute('aria-expanded')) {
        x.setAttribute('aria-expanded', 'true');
    } else {
        x.setAttribute('aria-expanded', 'false');
    }
} 

function toggle_ans(ans) {
    question = document.getElementById('q-' + ans);
    answer = document.getElementById('ans-' + ans);
    question.classList.toggle('q_active');
    answer.classList.toggle('active');
}

function dispBio(who) {
    document.getElementById('bio_modals').classList.toggle('show');
    document.getElementById(who).classList.toggle('show');
}

function biosOff() {
    us = ['noah', 'alex', 'patrick', 'peter', 'brooke', 'mitch'];
    document.getElementById('bio_modals').classList.remove('show');
    for (i = 0; i < us.length; i++) {
        document.getElementById(us[i]).classList.remove('show');
    } 
}