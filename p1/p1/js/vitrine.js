$('body').on('click', '#btnBuscar', ev=>{
    ev.preventDefault();
    const q = $('input[name="q"]').val();
    window.location.href= `/p1_Completo/p1/p1/html/busca.php?q=${q}`
    return false;
})