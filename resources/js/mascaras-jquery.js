/**
 * Mascarar padrões do sistema
 */
window.loadMask = function() {
    $('.date').mask('00/00/0000');
    $('.cep').mask('00000-000');
    $('.preco').mask('000.000.000.000.000,00', { reverse: true });
    $('.phone').mask('(00) 0000-0000#');

    $('.time').mask('00:00:00');
    $('.date_time').mask('00/00/0000 00:00:00');
    $('.cpf').mask('000.000.000-00');
    $('.money').mask('000.000.000.000.000,00', { reverse: true });
    $('.money2').mask("#.##0,00", { reverse: true });
   
}

$(document).ready(function () {
    loadMask();
});
