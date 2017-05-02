function ediDate() {
    $('.editdate').editable('http://localhost:8888/feuille_de_route/retourjeditable.php', {
        onblur: 'submit',
        event: 'dblclick',
        type: 'datepicker',
        placeholder: '',
        data: function(value, settings) {
            return value;
        },
        callback: function(value, settings) {
            $('#semaineDU').html(moment(value).startOf('week').format('D MMMM YYYY'));
            $('#semaineAU').html(moment($('#semaineDU').html(), 'D MMMM YYYY').add(6, 'd').format('D MMMM YYYY'));
        }
    }
)
}

function semaine() {
    
    $('#semaineDU').dblclick(function() {
        ajouterInput();
    })
    
    $('#semaineDU').focusout(function() {
        alert('yep.');
        
    var valeur = $('#semaineDU').find('input').val();
    
//    moment(valeur, 'L').isValid() ? valeur = moment(valeur, 'L').format('D MMMM YYYY') : valeur = "";
        
        
    
    $('#semaineDU').html(moment(valeur).startOf('week').format('D MMMM YYYY'));
    $('#semaineAU').html(moment($('#semaineDU').html(), 'D MMMM YYYY').add(6, 'd').format('D MMMM YYYY'));
       
//    document.getElementById('semaineDU').removeChild( document.getElementById('semaineDU').children[0]);
        
    });
}

function ajouterInput () {
    
    document.getElementById('semaineDU').innerHTML = "";

    
    if (document.getElementById('semaineDU').hasChildNodes() !== true) {
    
    
    
    var element = document.createElement('input');
    
    element.type = "date";
    
    var semaineDU = document.getElementById('semaineDU');
    semaineDU.appendChild(element);
    }
}
    