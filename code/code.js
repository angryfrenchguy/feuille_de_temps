function semaine() {
    
    $('#semaineDU').on('touchstart click', function() {
        
        var def = $('#semaineDU').html();
        
        $('#semaineDU').html("");
        
        if (document.getElementById('semaineDU').hasChildNodes() !== true) {
        
        var element = document.createElement('input');
        element.type = "date";
        element.value = def;
        
        var semaineDU = document.getElementById('semaineDU');
        semaineDU.appendChild(element);
    }
    
    })
    
    $('#semaineDU').focusout(function() {
        var valeur = $('#semaineDU').find('input').val();
        
        $('#semaineDU').html(moment(valeur).startOf('week').format('D MMMM YYYY'));
        $('#semaineAU').html(moment($('#semaineDU').html(), 'D MMMM YYYY').add(6, 'd').format('D MMMM YYYY'));
    });
}
    