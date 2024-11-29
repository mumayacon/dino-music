//@mumayacon

    if (document.getElementById('tel')){

        document.getElementById('tel').addEventListener('click', function() {

            var textToCopy = this.getAttribute('data-text');
            navigator.clipboard.writeText(textToCopy).then(function() {

                alert('Texto copiado al portapapeles\nTeléfono: 4271504599');

            }).catch(function(error) {

                console.error('Error al copiar texto: ', error);

            });

        });

    }
    
    if (document.getElementById('btnReg')){

        document.getElementById('btnReg').addEventListener("click", function(){

            document.getElementById('btnReg').style.cursor = 'unset';
            document.body.style.cursor = "progress"
            setTimeout(function() {

                window.location.href = '../html/register.html';

            }, 800);

        })

    }