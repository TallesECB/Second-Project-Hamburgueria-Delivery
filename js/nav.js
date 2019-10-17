var actualPage = 1

var hoverhome = document.querySelector('a.hoverhome')
hoverhome.setAttribute('id', 'hover')

function homenav() {
    let navhome = document.querySelector('section.homesite')
    let navcardapio = document.querySelector('section.cardapiosite')
    let navsobre = document.querySelector('section.sobresite')
    
    var player = navcardapio.animate([
        {transform: 'translate(0px, 0px)'},
        {transform: 'translate(1400px, 0px)'}
        ], 1000);

    var player = navsobre.animate([
        {transform: 'translate(0px, 0px)'},
        {transform: 'translate(1400px, 0px)'}
        ], 1000);

        player.addEventListener('finish', function() {
            navcardapio.style.display = 'none';
            navsobre.style.display = 'none';
            navhome.style.display = 'block';

            var hoversobre = document.querySelector('a.hoversobre')
            hoversobre.setAttribute('id', 'hoveroff')

            var hovercardapio = document.querySelector('a.hovercardapio')
            hovercardapio.setAttribute('id', 'hoveroff')

            var hoverhome = document.querySelector('a.hoverhome')
            hoverhome.setAttribute('id', 'hover')

            actualPage = 1
        });
}

function cardapionav() {  
    if(actualPage == 1) {
        let navhome = document.querySelector('section.homesite')
        let navcardapio = document.querySelector('section.cardapiosite')
        let navsobre = document.querySelector('section.sobresite')

        var player = navhome.animate([
            {transform: 'translate(0px, 0px)'},
            {transform: 'translate(-1400px, 0px)'}
            ], 1000);

        player.addEventListener('finish', function() {
            navhome.style.display = 'none';
            navsobre.style.display = 'none';
            navcardapio.style.display = 'block';

            var hoverhome = document.querySelector('a.hoverhome')
            hoverhome.setAttribute('id', 'hoveroff')

            var hovercardapio = document.querySelector('a.hovercardapio')
            hovercardapio.setAttribute('id', 'hover')

            var player = navcardapio.animate([
                {transform: 'translate(1000px, 0px)'},
                {transform: 'translate(0px, 0px)'},
                ], 5000);

            actualPage = 2
        }); 
    }

    if(actualPage == 3) { 
        let navhome = document.querySelector('section.homesite')
        let navcardapio = document.querySelector('section.cardapiosite')
        let navsobre = document.querySelector('section.sobresite')

        var playersobre = navsobre.animate([
            {transform: 'translate(0px, 0px)'},
            {transform: 'translate(1400px, 0px)'},
            ], 1000);

        playersobre.addEventListener('finish', function() {
            navhome.style.display = 'none';
            navsobre.style.display = 'none';
            navcardapio.style.display = 'block';
            
            var hoversobre = document.querySelector('a.hoversobre')
            hoversobre.setAttribute('id', 'hoveroff')

            var hovercardapio = document.querySelector('a.hovercardapio')
            hovercardapio.setAttribute('id', 'hover')

            var player = navcardapio.animate([
                {transform: 'translate(-1000px, 0px)'},
                {transform: 'translate(0px, 0px)'},
                ], 5000);

            actualPage = 2
        });          
    }
}

function sobrenav() {
    let navhome = document.querySelector('section.homesite')
    let navcardapio = document.querySelector('section.cardapiosite')
    let navsobre = document.querySelector('section.sobresite')

        var player = navhome.animate([
        {transform: 'translate(0px, 0px)'},
        {transform: 'translate(-1400px, 0px)'}
        ], 1000);

        var player = navcardapio.animate([
        {transform: 'translate(0px, 0px)'},
        {transform: 'translate(-1400px, 0px)'}
        ], 1000);

    player.addEventListener('finish', function() {
        navhome.style.display = 'none';
        navcardapio.style.display = 'none';
        navsobre.style.display = 'block';

        var hovercardapio = document.querySelector('a.hovercardapio')
        hovercardapio.setAttribute('id', 'hoveroff')

        var hoverhome = document.querySelector('a.hoverhome')
        hoverhome.setAttribute('id', 'hoveroff')
        
        var hoversobre = document.querySelector('a.hoversobre')
        hoversobre.setAttribute('id', 'hover')

        actualPage = 3
    });
}

function registro() {
    $("#myModalRegistro").modal({
        show: true
    });
}

function hoverpag () {
    let hoverhome = document.querySelector('section.homesite')


    hoverhome.setAttribute('id', 'none')
}