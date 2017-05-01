//function datePicker() {
//    
//    $('.datepicker').datepicker({
//        firstday: 0, //met le début de la semaine le dimanche
////        dateFormat: 'd MM yy',
//        altField: '#semaineAU',
//        altFormat: 'd MM yy'
//    });
//    
////    var zzz = this;
//    
//    $('.datepicker').datepicker('setDate', zzz);
//}

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
    