document.addEventListener('DOMContentLoaded', function() {
  
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay'
      },
      
      //initialDate: '2023-01-12',
      locale: 'pt-br',
      themeSystem: 'bootstrap5',

      navLinks: true, // can click day/week names to navigate views
      selectable: true,
      selectMirror: true,
    
      editable: true,
      dayMaxEvents: true, // allow "more" link when too many events
      
      events: 'listar_atividade.php',
      //recebe o clique na atividade
      eventClick: function (info) {
    
        const mostrarModal = document.getElementById("mostrarModal");
        const modal = new bootstrap.Modal(mostrarModal);
    
        // Preenche os campos do modal
        document.getElementById("mostrar_nome").innerText = info.event.title;
        document.getElementById("mostrar_descricao").innerText = info.event.extendedProps.descricao;
        document.getElementById("mostrar_inicio").innerText = info.event.start.toLocaleString();
    
        // Verifica se a data de fim está definida
        const dataFim = info.event.end ? info.event.end.toLocaleString() : "Data de fim não definida";
        document.getElementById("mostrar_fim").innerText = dataFim;
    
        document.getElementById("mostrar_status").innerText = info.event.extendedProps.status;
    
        const editarLink = document.getElementById("editarLink");
        const excluirLink = document.getElementById("excluirLink");
    
        if (editarLink && excluirLink) {
            editarLink.href = "editar.php?id=" + info.event.id;
            excluirLink.href = "excluir.php?id=" + info.event.id;
        } else {
            console.error("Links não encontrado.");
        }
    
        // Abre o modal
        modal.show();
    },
      


    });

    calendar.render();
  });